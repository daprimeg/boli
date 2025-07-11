@extends('admin.partial.app')
@push('title') Alert @endpush
@section('css')
<style>

   .form-label{
         padding-top: 18px;
         padding-bottom: 6px;
         font-size: 15px;
   }

   .ck-editor__editable {
        min-height: 300px !important;
    }
</style>
@endsection
@section('content')

<div class="container-fluid container-p-y">
      <div class="row g-6"> 
            <div class="col-md-12">

                @if($errors->any())
                  <div class="alert alert-danger">
                     <ul class="mb-0">
                        @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif

                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Edit Alert</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/alerts')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                           <form id="alertEditForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="">
                                    <label class="form-label" >Audience</label>
                                    <select name="audience" class="form-control">
                                        <option {{ $alert->audience == 'All Members' ? 'selected' : '' }}>All Members</option>
                                        <option {{ $alert->audience == 'Membership Package 1 users' ? 'selected' : '' }}>Membership Package 1 users</option>
                                        <option {{ $alert->audience == 'Membership Package 2 users' ? 'selected' : '' }}>Membership Package 2 users</option>
                                        <option {{ $alert->audience == 'Membership Package 3 users' ? 'selected' : '' }}>Membership Package 3 users</option>
                                        <option {{ $alert->audience == 'Membership Package 4 users' ? 'selected' : '' }}>Membership Package 4 users</option>
                                        <option {{ $alert->audience == 'Business Owners' ? 'selected' : '' }}>Business Owners</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" value="{{ $alert->subject }}" required>
                                </div>

                                <div class="">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="5" required>{{ $alert->message }}</textarea>
                                </div>

                                <div class="">
                                    <label class="form-label">File (optional)</label>
                                    <input type="file" name="file" class="form-control">
                                    @if($alert->file)
                                        <p class="mt-2">Current file: <a href="{{ asset('uploads/alerts/'.$alert->file) }}" target="_blank">{{ $alert->file }}</a></p>
                                    @endif
                                </div>

                                <div class="text-center pt-5" >
                                    <button type="submit" class="btn btn-primary">Update Alert</button>
                                </div>

                                
                            </form>

                    </div>

                </div>
            </div>
      </div>
</div>


@endsection
@section('js')
    <script>
        $('#alertEditForm').submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('_method', 'PUT'); // since it's an update

            $.ajax({
                url: '{{ route("alerts.update", $alert->id) }}',
                method: 'POST',  // still POST because of _method override
                data: formData,
                contentType: false,
                processData: false,
                success: function(){
                    window.location.href = '{{ route("alerts.index") }}';
                },
                error: function(xhr) {
                    alert('Something went wrong. Please check your input.');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection