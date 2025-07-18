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
                                <h5 class="card-title">Create Alert</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/alerts')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                           <form id="alertForm" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" >Audience</label>
                                    <select name="audience" class="form-control">
                                        <option>All Members</option>
                                        <option>Membership Package 1 users</option>
                                        <option>Membership Package 2 users</option>
                                        <option>Membership Package 3 users</option>
                                        <option>Membership Package 4 users</option>
                                        <option>Business Owners</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">File (optional)</label>
                                    <input type="file" name="file" class="form-control">
                                </div>

                                <div class="text-center pt-5" > 
                                     <button type="submit" class="btn btn-primary">Submit</button>
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
 
    </script>
@endsection

