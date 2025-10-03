<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
    <a class="nav-link dropdown-toggle hide-arrow btn btn-icon btn-text-secondary rounded-pill"
        href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        <span class="position-relative">
            <i class="icon-base ti tabler-bell icon-22px text-heading"></i>
            @if($UserNotifications->count() > 0)
                <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
            @endif
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end p-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h6 class="mb-0 me-auto">Notifications</h6>
                <div class="d-flex align-items-center h6 mb-0">
                    <span class="badge bg-label-primary me-2">{{ $UserNotifications->count() }} New</span>
                    <a href="javascript:void(0)" class="dropdown-notifications-all p-2 btn btn-icon"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read">
                        <i class="icon-base ti tabler-mail-opened text-heading"></i>
                    </a>
                </div>
            </div>
        </li>

        <li class="dropdown-notifications-list scrollable-container">
            <ul class="list-group list-group-flush">

            @forelse($UserNotifications as $n)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item {{ $n->is_read ? 'marked-as-read' : '' }}"
                        @if($n->link) onclick="window.location.href='{{ url($n->link) }}'" style="cursor: pointer;" @endif>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    @if($n->image)
                                        @php
                                            $imageUrl = Str::startsWith($n->image, ['http://', 'https://']) ? $n->image : asset('public/uploads/blogs/' . $n->image);
                                        @endphp
                                        <img src="{{ $imageUrl }}" alt="Notification Image" class="rounded-circle" width="40" height="40">
                                    @else
                                        <span class="avatar-initial rounded-circle bg-label-primary">
                                            <i class="icon-base ti tabler-bell"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1 small">{{ $n->title }}</h6>
                                <small class="mb-1 d-block text-body">{{ $n->message }}</small>
                                <small class="text-body-secondary">{{ $n->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="{{ route('notifications.read', $n->id) }}" class="dropdown-notifications-read">
                                    <span class="badge badge-dot"></span>
                                </a>
                                <a data-id="{{ $n->id }}" class="dropdown-notifications-archive">
                                    <span class="icon-base ti tabler-x"></span>
                                </a>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center">
                        <small class="text-muted">No new notifications</small>
                    </li>
                @endforelse



            </ul>
        </li>

        <li class="border-top">
            <div class="d-grid p-4">
                <a class="btn btn-primary btn-sm d-flex" href="{{ route('notifications.all') }}">
                    <small class="align-middle">View all notifications</small>
                </a>
            </div>
        </li>
    </ul>
</li>
