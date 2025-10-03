@extends('user.partial.app')
@push('title') Notifications Setting @endpush

@section('css')
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
  .notifications-container {
    background: #000F21;
    min-height: 100vh;
    padding: 2rem 0;
  }
  
/* Default size adjustment */
.form-check-input {
    width: 48px !important;
    height: 24px !important;
    cursor: pointer;
}

/* Unchecked state */
.form-check-input:not(:checked) {
    background-color: #ccc !important;
    border-color: #ccc !important;
}

/* Checked state */
.form-check-input:checked {
    background-color: #0080FF !important;
    border-color: #0080FF !important;
}

/* Smooth transition */
.form-check-input {
    transition: background-color 0.3s ease, border-color 0.3s ease;
}
.form-check-input {
    width: 50px;
    height: 24px;
    cursor: pointer;
}

.form-check-input:checked {
    background-color: #0080FF;
    border-color: #0080FF;
}

.badge {
    padding: 4px 8px;
    border-radius: 8px;
    font-weight: 500;
}


</style>
@endsection

@section('content')

<div class="notifications-container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        @include('user.account-setting.ui')
      </div>

      <div class="col-md-12">
        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

<div class="card mb-6">
    <!-- Notifications -->
    <div class="card-header">
        <h5 class="mb-0">Notifications</h5>
        <span class="card-subtitle">Change to notification settings, the user will get the update</span>
    </div>
        <form id="notificationForm" action="{{ route('user.notifications.store') }}" method="POST">
          @csrf
          <div class="table-responsive">
              <table class="table">
                  <thead class="border-top">
                      <tr>
                          <th class="text-nowrap">Type</th>
                          <th class="text-nowrap text-center">
                              Email <br>
                    
                          </th>
                          <th class="text-nowrap text-center">
                              Browser <br>
                              
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                        @php
                          use Illuminate\Support\Str;
                        @endphp

                      @foreach ($notificationTypes as $category => $types)
                          @php
                              $catClass = Str::slug($category, '-'); // safe class/id
                          @endphp

                
                          <tr class="table-primary" data-bs-toggle="collapse" data-bs-target="#cat-{{ $catClass }}" style="cursor:pointer">
                              <td class="fw-bold text-capitalize">
                                  {{ str_replace('_', ' ', $category) }}
                              </td>

                              <!-- Email Select All -->
                              <td class="text-center">
                                  <div class="d-flex flex-column align-items-center" onclick="event.stopPropagation();">
                                      <div class="form-check form-switch">
                                          <input class="form-check-input select-category-email" type="checkbox" role="switch"
                                                id="switch-email-{{ $catClass }}" data-target="{{ $catClass }}">
                                      </div>
                                      <span class="badge bg-primary mt-1" style="font-size: 11px; cursor:pointer;">
                                          Select All (Email)
                                      </span>
                                  </div>
                              </td>

                              <td class="text-center">
                                  <div class="d-flex flex-column align-items-center" onclick="event.stopPropagation();">
                                      <div class="form-check form-switch">
                                          <input class="form-check-input select-category-browser" type="checkbox" role="switch"
                                                id="switch-browser-{{ $catClass }}" data-target="{{ $catClass }}">
                                      </div>
                                      <span class="badge bg-success mt-1" style="font-size: 11px; cursor:pointer;">
                                          Select All (Browser)
                                      </span>
                                  </div>
                              </td>
                          </tr>


                          @foreach ($types as $type => $label)
                              @php
                                  $userSetting = $settings[$type] ?? null;
                              @endphp
                              <tr class="collapse" id="cat-{{ $catClass }}">
                                  <td>{{ $label }}</td>

                                  <!-- Email Switch -->
                                  <td style="text-align: center; padding: 1rem; border: none;">
                                      <div class="form-check form-switch d-flex justify-content-center">
                                          <input class="form-check-input email-checkbox {{ $catClass }}-email" 
                                                type="checkbox" 
                                                id="switch-email-{{ $type }}"
                                                name="types[{{ $type }}][email]" 
                                                value="1"
                                                {{ $userSetting && $userSetting->email ? 'checked' : '' }}>
                                      </div>
                                  </td>

                                  <!-- Browser Switch -->
                                  <td style="text-align: center; padding: 1rem; border: none;">
                                      <div class="form-check form-switch d-flex justify-content-center">
                                          <input class="form-check-input browser-checkbox {{ $catClass }}-browser" 
                                                type="checkbox" 
                                                id="switch-browser-{{ $type }}"
                                                name="types[{{ $type }}][browser]" 
                                                value="1"
                                                {{ $userSetting && $userSetting->browser ? 'checked' : '' }}>
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                      @endforeach

                      </tbody>
              </table>
          </div>
          <div class="card-body">
                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                    <button type="reset" class="btn btn-label-secondary">Discard</button>
          </div>
        </form>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection

@section('js')

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Category Email select
    document.querySelectorAll(".select-category-email").forEach(function(categoryCheckbox) {
        categoryCheckbox.addEventListener("change", function() {
            let category = this.getAttribute("data-target");
            document.querySelectorAll("." + category + "-email").forEach(cb => {
                cb.checked = this.checked;
            });
        });
    });

    // Category Browser select
    document.querySelectorAll(".select-category-browser").forEach(function(categoryCheckbox) {
        categoryCheckbox.addEventListener("change", function() {
            let category = this.getAttribute("data-target");
            document.querySelectorAll("." + category + "-browser").forEach(cb => {
                cb.checked = this.checked;
            });
        });
    });
});




document.addEventListener("DOMContentLoaded", function() {
    let form = document.getElementById("notificationForm");

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": form.querySelector('input[name="_token"]').value,
                "Accept": "application/json"
            },
            body: formData
        })
        .then(res => res.json().catch(() => null).then(data => ({ok: res.ok, status: res.status, data})))
        .then(response => {
            if (response.ok) {
                toastr.success("Notification settings updated successfully!", "Success");
            } else {
                toastr.error("Something went wrong. Please try again.", "Error");
                console.error(response.data);
            }
        })
        .catch(err => {
            toastr.error("Server error occurred.", "Error");
            console.error(err);
        });
    });

    // Toastr options (optional customization)
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "4000"
    };
});




</script>
@endsection
