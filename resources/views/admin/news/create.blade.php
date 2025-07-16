@extends('admin.partial.app')
@push('title') News @endpush
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
                                <h5 class="card-title">Create News</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/news')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                           <form action="{{url('/admin/news')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label" >Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Feature Image</label>
                                            <input type="file" name="feature_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center pt-5" > 
                                     <button class="btn btn-primary">Save</button>
                                </div>
                               
                            </form>

                    </div>

                </div>
            </div>
      </div>
</div>


@endsection
@section('js')
    
@endsection

