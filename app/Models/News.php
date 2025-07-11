<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    

    protected $fillable = [
        'title',
        'feature_image',
        'description',
        'date',
        'created_by',
    ];

    // The users who pinned this news
    // In the News model
public function pinnedUsers()
{
    return $this->belongsToMany(User::class, 'news_user_pins', 'news_id', 'user_id');
}


    // The admin who created it
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    


}
