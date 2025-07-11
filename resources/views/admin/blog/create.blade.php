@extends('admin.partial.app')
@push('title') Blog @endpush
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
                                <h5 class="card-title">Create Blog</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                 <a href="{{URL::to('/admin/blogs')}}" class="btn btn-primary">Back To List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.blog.form')

                            <div class="text-center pt-5 ">
                                 <button class="btn btn-primary">Create</button>
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
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new MyUploadAdapter(loader);
                };
            })
            .catch(error => {
                console.error(error);
            });

        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => {
                        return new Promise((resolve, reject) => {
                            const data = new FormData();
                            data.append('upload', file);
                            data.append('_token', '{{ csrf_token() }}');

                            fetch("{{ route('blogs.upload') }}", {
                                method: 'POST',
                                body: data
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.url) {
                                    resolve({
                                        default: result.url
                                    });
                                } else {
                                    reject(result.error || 'Upload failed.');
                                }
                            })
                            .catch(() => {
                                reject('Upload failed.');
                            });
                        });
                    });
            }

            abort() {
                // You can implement this if needed
            }
        }

    </script>
@endsection
