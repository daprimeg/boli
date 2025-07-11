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
                                <h5 class="card-title">Edit News</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/news')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                         <div class="form-group mb-3">
                                            <label class="form-label" >Title</label>
                                            <input type="text" name="title" value="{{ $news->title }}" class="form-control" required>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" value="{{ $news->date }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group ">
                                            <label class="form-label">Feature Image</label>
                                            <input type="file" name="feature_image" class="form-control pb-2" />
                                            @if($news->feature_image)
                                                <a href="{{ asset('/public/uploads/news/'.$news->feature_image) }}" target="_blank">
                                                    <img src="{{ asset('/public/uploads/news/'.$news->feature_image) }}" width="100" />
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                         <div class="form-group ">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" required>{{ $news->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center pt-5">
                                        <button class="btn btn-primary">Update</button>
                                    </div>

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
