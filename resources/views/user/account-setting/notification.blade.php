@extends('user.partial.app')
@push('title') Notifications Setting @endpush

@section('content')
<div class="container-fluid pt-5">
  <div class="row">
    <div class="col-md-12">
      @include('user.account-setting.ui')
    </div>

    <div class="col-md-12">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
<form method="POST" action="{{ route('user.notifications.store') }}">
    @csrf
    <div class="card-body">
        <h5 class="mb-1">Notification Preferences</h5>
        <span class="card-subtitle">Choose how you want to receive notifications.</span>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-nowrap">Type</th>
                    <th class="text-nowrap text-center">Email</th>
                    <th class="text-nowrap text-center">Browser</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notificationTypes as $category => $types)
    <tr>
        <td colspan="3" class="fw-bold text-primary">
            {{ ucfirst(str_replace('_', ' ', $category)) }}
        </td>
    </tr>

    @foreach($types as $key => $label)
        <tr>
            <td class="text-nowrap text-heading">{{ $label }}</td>
            <td>
                <div class="form-check mb-0 d-flex justify-content-center align-items-center">
                    <input type="checkbox" class="form-check-input"
                        name="types[{{ $key }}][email]"
                        {{ ($settings[$key]->email ?? false) ? 'checked' : '' }}>
                </div>
            </td>
            <td>
                <div class="form-check mb-0 d-flex justify-content-center align-items-center">
                    <input type="checkbox" class="form-check-input"
                        name="types[{{ $key }}][browser]"
                        {{ ($settings[$key]->browser ?? false) ? 'checked' : '' }}>
                </div>
            </td>
        </tr>
    @endforeach
@endforeach

            </tbody>
        </table>
    </div>

    {{-- ✅ Global preference --}}
    <div class="card-body">
        <h6 class="text-body mb-3">When should we send you notifications?</h6>
        <div class="row">
            <div class="col-sm-6">
                <select id="sendNotification" class="form-select" name="sendNotification">
                    <option value="anytime" {{ ($globalSetting->send_preference ?? 'anytime') == 'anytime' ? 'selected' : '' }}>
                        Anytime
                    </option>
                    <option value="online" {{ ($globalSetting->send_preference ?? '') == 'online' ? 'selected' : '' }}>
                        Only when I'm online
                    </option>
                </select>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="mt-6">
            <button type="submit" class="btn btn-primary me-3">Save changes</button>
            <button type="reset" class="btn btn-label-secondary">Discard</button>
        </div>
    </div>
</form>

      </div>
    </div>

  </div>
</div>
@endsection
