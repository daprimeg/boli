@extends('admin.partial.app')
@push('title') Model @endpush
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
                            <h5 class="card-title">Edit Model</h5>
                        </div>
                        <div class="col-md-6 text-end">
                                <a href="{{URL::to('/admin/masters/models')}}" class="btn btn-primary">Back To List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/masters/models/'.$model->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name',$model->name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Make <span class="text-danger">*</span></label>
                                    <select name="make_id" class="form-control make" required >
                                        @if($model->make)
                                        <option value="{{$model->make_id}}">{{$model->make->name}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-5" >
                            <button type="submit" class="btn btn-primary">Update</button>
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
