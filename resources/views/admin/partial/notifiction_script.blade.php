<script src="https://js.pusher.com/8.2/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.15.0/echo.iife.js"></script>
<script>
    window.Pusher = Pusher;

    const userId = '{{ auth()->id() }}';

    if (userId) {
        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: "{{ env('PUSHER_APP_KEY') }}",
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            forceTLS: true,  
            authEndpoint: "{{ url('/broadcasting/auth') }}",
            auth: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        Echo.private(`notifications.${userId}`)
            .listen('.NewBlogNotification', (e) => {
                console.log("📣 New notification:", e);

                let list = document.querySelector(".dropdown-notifications-list ul.list-group");

                if (list) {
                    let newItem = `
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar">
                                        <span class="avatar-initial rounded-circle bg-label-primary">
                                            <i class="icon-base ti tabler-bell"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 small">${e.title}</h6>
                                    <small class="mb-1 d-block text-body">${e.message}</small>
                                    <small class="text-body-secondary">just now</small>
                                </div>
                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                    <a href="javascript:void(0)" class="dropdown-notifications-read">
                                        <span class="badge badge-dot"></span>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-notifications-archive">
                                        <span class="icon-base ti tabler-x"></span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    `;

            
                    list.insertAdjacentHTML("afterbegin", newItem);

             
                    let badge = document.querySelector(".badge-notifications");
                    if (badge) {
                        badge.style.display = "inline-block";
                    }

          
                    let countBadge = document.querySelector(".dropdown-menu-header .badge.bg-label-primary");
                    if (countBadge) {
                        let current = parseInt(countBadge.textContent) || 0;
                        countBadge.textContent = (current + 1) + " New";
                    }
                }

          
                let audio = new Audio("{{ asset('sounds/notify.WAV') }}");
                audio.play();

              
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "5000"
                };
                toastr.success(e.message, e.title);
            });
    }
</script>
