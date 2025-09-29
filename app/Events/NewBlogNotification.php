<?php

namespace App\Events;

use App\Models\User;
use App\Models\UserNotificationAlert;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewBlogNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    public $user;
    public $notification;

    public function __construct(User $user, $title, $message)
    {
        $this->user = $user;

        // Create DB entry here
        $this->notification = UserNotificationAlert::create([
            'user_id' => $user->id,
            'title' => $title,
            'message' => $message,
            'is_read' => 0
        ]);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifications.' . $this->user->id);
    }

    public function broadcastAs()
    {
        return 'NewBlogNotification';
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->notification->id,
            'title' => $this->notification->title,
            'message' => $this->notification->message,
            'is_read' => $this->notification->is_read,
            'created_at' => $this->notification->created_at->toDateTimeString()
        ];
    }
}
