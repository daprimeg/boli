@extends('admin.partial.app')
@push('title') Users @endpush
@section('css')
<style>
   .form-label{
         padding-top: 18px;
         padding-bottom: 6px;
         font-size: 15px;
   }
</style>
@endsection
@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-6"> 
         <div class="col-md-12">
             <?php $id = $user ? $user->id : 0; ?> 
             <form action="{{ url('/admin/users/'.$id.'/update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
              
              
                <div class="card">
                    <div class="card-header border-bottom">
                         <h5 class="card-title">{{$user ? 'Edit' : 'Create'}} User</h5>
                    </div>
                    <div class="card-body">
                     
                        <div class="row py-5">
                            <div class="col-12">
                                <p style="border-bottom: 1px solid #44485e" ></p>
                            </div>
                        </div>
                        <div class="row pb-5">
                                <div class="col-12 ">
                                    <h4 class="card-title ">Personal Information</h4>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="title" required class="form-control" value="{{$user ? $user->title : ''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="personalEmail" required class="form-control" value="{{$user ? $user->personalEmail : ''}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Password @if(!$user) <span class="text-danger">*</span>@endif</label>
                                        <input type="password" name="password" @if(!$user) required @endif class="form-control" />
                                        @if($user) <p class="pt-2" >Leave It Blank For Default Password</p>  @endif
                                    </div>
                                </div>
                           
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                        <select id="role" name="role" class="form-select form-select-sm role"></select>
                                    </div>
                                </div> 
                           
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                        @if( $user && $user->avatar)
                                            <a class="d-block pt-2" href="{{ asset('/public/uploads/avatar/'.$user->avatar) }}" target="_blank">
                                            <img src="{{ asset('/public/uploads/avatar/'.$user->avatar) }}" width="80" class="mt-2" />
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status" required class="form-control">
                                            <option value="1" {{$user && $user->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{$user && $user->status == 0 ? 'selected' : '' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-5">
                                 <div class="col-12">
                                    <p style="border-bottom: 1px solid #44485e" ></p>
                                </div>
                            </div>
                    
                            <div class="card-footer">
                                <div class="text-center pt-5" >
                                    @if(!empty($user))
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                    @else
                                    <button type="submit" class="btn btn-primary">Create User</button>

                                    @endif
                                </div>
                            </div>
                        </div>    
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
$(document).ready(function () {



@if($user)
    @if($user->user_type == 0)
        let currentRole = {
            id: 0,
            text: "Subscriber"
        };
    @else
        let currentRole = {
            id: "{{ $user->user_type }}",
            text: "{{ $user->role->name ?? '' }}"
        };
    @endif

    let option = new Option(currentRole.text, currentRole.id, true, true);
    $('.role').append(option).trigger('change');
@endif

});
</script>


@endsection


