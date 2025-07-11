@extends('admin.partial.app')
@push('title') Blog Category @endpush
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
                                <h5 class="card-title">{{ isset($blogcategory) ? 'Edit' : 'Add' }} Blog Category</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/blogcategories')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ isset($blogcategory) ? route('blogcategories.update', $blogcategory->id) : route('blogcategories.store') }}" method="POST">
                            @csrf
                                @if(isset($blogcategory)) @method('PUT') @endif
                                <div class="mb-3">
                                    <label class="form-label" >Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $blogcategory->name ?? old('name') }}" required>
                                </div>
                                <div class="text-center pt-5" >
                                    <button class="btn btn-primary">{{ isset($blogcategory) ? 'Update' : 'Create' }}</button>
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




