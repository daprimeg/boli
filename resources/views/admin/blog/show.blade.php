
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


         <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                            <small>
                            @if($blog->category)
                                <span class="badge bg-secondary">{{ $blog->category->name }}</span>
                            @endif
                            Posted on: {{ $blog->date }} 
                            | By: {{ $blog->author->name ?? 'Unknown' }}
                        </small>
                    </div>
                    <div class="col-md-6 text-end">
                            {{-- <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add New News</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">

                @if($blog->image)
                    <div  class="text-center" > 
                        <img style="max-width: 300px" src="{{ asset('public/uploads/blogs/'.$blog->image) }}" alt="{{ $blog->title }}" class="pt-5 img-fluid ">
                    </div>
                    
                @endif
                <div>
                    {!! $blog->description !!}
                </div>
                <div class="mt-3">
                    <strong>Tags:</strong> {{ $blog->tag }}
                </div>
                <hr>
                <div>
                    <h6>Meta Data</h6>
                    <p><strong>Meta Title:</strong> {{ $blog->meta_title }}</p>
                    <p><strong>Meta Description:</strong> {{ $blog->meta_description }}</p>
                    <p><strong>Meta Keyword:</strong> {{ $blog->meta_keyword }}</p>
                </div>

            </div>
                <div class="card-footer">
                <a href="{{ url('/admin/blogs') }}" class="btn btn-secondary">Back to Blog List</a>
            </div>
        </div>



    @endsection
    @section('js')
        <script>
            document.querySelectorAll('oembed[url]').forEach(element => {
                const url = element.getAttribute('url');
                if (url.includes('youtube.com')) {
                    const videoId = new URL(url).searchParams.get('v');
                    if (videoId) {
                        const iframe = document.createElement('iframe');
                        iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId);
                        iframe.setAttribute('frameborder', '0');
                        iframe.setAttribute('allowfullscreen', '1');
                        iframe.style.width = '100%';
                        iframe.style.height = '400px';
                        element.parentNode.replaceChild(iframe, element);
                    }
                }
            });
        </script>
    @endsection
