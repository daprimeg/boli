@extends('admin.partial.app')
@push('title') vehicles @endpush
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
                                <h5 class="card-title">Edit vehicles</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/vehicles')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                       <form method="POST" action="{{ url::to('/admin/vehicles/update/' . $vehicle->id) }}" enctype="multipart/form-data">
                          @csrf @method('PUT')
                           @include('admin.vehicles.form')
                           <div class="text-center pt-5" > 
                                <button class="btn btn-primary">Update</button>
                            </div>
                            
                        </form>

                    </div>

                </div>
            </div>
      </div>
</div>

                                               
          
                           

@endsection
@section('js')
    <script src="{{ asset('public/assets/ckeditor/build/ckeditor.js') }}"></script>
    
@endsection