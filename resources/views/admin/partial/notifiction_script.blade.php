<script src="https://js.pusher.com/8.2/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.15.0/echo.iife.js"></script>
<script>
    function truncateText(text, limit = 50) {
        if (!text) return "";
        return text.length > limit ? text.substring(0, limit) + "..." : text;
    }
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

        let notificationAudio = new Audio("{{ asset('public/sound/notify.mp3') }}");
        notificationAudio.load();

        Echo.private(`notifications.${userId}`)
            .listen('.NotificationEvent', (e) => {

                let list = document.querySelector(".dropdown-notifications-list ul.list-group");
                console.log(e)
                    if (list) {
                        // ✅ Image handling
                        let avatarHtml = e.image 
                            ? `<img src="${e.image.startsWith('http') ? e.image : `{{ url('public/uploads/blogs') }}/${e.image}`}" 
                                    alt="Notification Image" class="rounded-circle border shadow-sm" width="40" height="40">`
                            : `<span class="avatar-initial rounded-circle bg-label-primary d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                                    <i class="icon-base ti tabler-bell fs-5"></i>
                            </span>`;

                        // ✅ Link handling
                        let linkStart = e.link 
                            ? `<a href="${e.link.startsWith('http') ? e.link : `{{ url('/') }}/${e.link}`}" class="d-flex text-decoration-none text-body">` 
                            : `<div class="d-flex">`;

                        let linkEnd = e.link ? `</a>` : `</div>`;

                        // ✅ Text truncate
                        let title   = truncateText(e.title, 40); 
                        let message = truncateText(e.message, 80);  // yahan galti thi, pehle `e.title` tha

                        // ✅ Final UI
                        let newItem = `
                            <li class="list-group-item list-group-item-action dropdown-notifications-item d-flex align-items-start">
                                ${linkStart}
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            ${avatarHtml}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 small fw-semibold text-truncate" title="${e.title}">${title}</h6>
                                        <small class="mb-1 d-block text-body text-truncate" title="${e.message}">${message}</small>
                                        <small class="text-body-secondary">just now</small>
                                    </div>
                                    <div class="flex-shrink-0 dropdown-notifications-actions ms-2">
                                        <a href="javascript:void(0)" class="dropdown-notifications-read me-2" title="Mark as read">
                                            <span class="badge badge-dot"></span>
                                        </a>
                                        <a data-id="${ e.id }" class="dropdown-notifications-archive" title="Remove">
                                            <span class="icon-base ti tabler-x"></span>
                                        </a>
                                    </div>
                                ${linkEnd}
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

          
                notificationAudio.play().catch(err => console.log(err));

              toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right", 
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "hideDuration": "300",
                    "showDuration": "300",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success(e.message, e.title);
            });
    }




$(document).on('click', '.dropdown-notifications-archive', function(e) {
    e.preventDefault(); 

    let notificationId = $(this).data('id');
    let $notificationItem = $(this).closest('li');

    if (!notificationId) return;

    $.ajax({
        url: "{{ url('notifications/delete') }}/" + notificationId,
        type: 'POST', 
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(res) {
            $notificationItem.remove();

            // Update badge
            let countBadge = $(".dropdown-menu-header .badge.bg-label-primary");
            if(countBadge.length){
                let current = parseInt(countBadge.text()) || 0;
                countBadge.text( Math.max(current - 1, 0) + " New");
                if(current - 1 <= 0){
                    $(".badge-notifications").hide();
                }
            }

            toastr.success('Notification deleted');
        },
        error: function(err) {
            console.log(err);
            toastr.error('Failed to delete notification');
        }
    });
});

</script>
