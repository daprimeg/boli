@extends('admin.partial.app')
@push('title') Make @endpush
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
                            <h5 class="card-title">Edit Make</h5>
                        </div>
                        <div class="col-md-6 text-end">
                                <a href="{{URL::to('/admin/masters/makes')}}" class="btn btn-primary">Back To List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/masters/makes/'.$model->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name',$model->name) }}" required />
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-4" >
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
