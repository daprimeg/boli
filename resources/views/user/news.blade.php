@extends('admin.partial.app')
@push('title')
    News
@endpush
@section('css')
    <style>
      

        .news-list {
            width: 20%;
            border-right: 1px solid var(--bs-b-color)!important;
            padding-right: 20px;
          
            overflow-y: auto;
            /* padding-left: 50px; */
            padding: 0;

        }

        .news-detail {
            width: 80%;
            padding: 30px
        }
        .hover-news > div:hover {
        background-color: #001020;
        cursor: pointer;
    }
    {
         background-color: #001020;
    }
    </style>
@endsection

@section('content')
            {{-- <div class="card-header d-flex justify-content-between">
                <h5>📰 News</h5>
                <form method="GET" action="{{ route('news.index') }}">
                    <label>
                        <input type="checkbox" name="pinned" value="1" onchange="this.form.submit()"
                            {{ request('pinned') ? 'checked' : '' }}>
                        Show only pinned
                    </label>
                </form>
            </div> --}}
            
                <div class="d-flex "  style="background: #0f1c2d; height: 100%; !important ; ">
                    {{-- 📋 Left side: News List --}}
                    <div class="news-list col-4 hover-news" >
                        @foreach ($news as $item)
                            <div class="mb-3 border-bottom "style="padding: 20px; text-align-center  ">
                                <h6 style="font-size: 18px; font-weight: 500; cursor: pointer;" onclick="showNews({{ $item->id }})">
                                    {{ $item->title }}
                                </h6>
                                <small class="text-muted"><span
                                        style="background-color: #00316b; color: white;padding:4px 12px; border-radius: 4px; font-size: 12px;">Category</span> {{ $item->date }}</small>

                            </div>
                        @endforeach
                    </div>

                    {{-- 📖 Right side: Expanded Content --}}
                    <div class="news-detail col-7 ">

                        @foreach ($news as $item)
                            <div id="news-{{ $item->id }}" class="news-full-content "
                                style="display: none; background-color: #001020;  color: #ffffff; padding: 50px; border-radius: 8px; margin-bottom: 24px; font-family: Arial, sans-serif;">
                                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                                    <span
                                        style="background-color: #00316b; color: white; padding:4px 12px; border-radius: 4px; font-size: 12px; margin-right: 12px;">Category</span>
                                    <span style="color: #c9d1d9; font-size: 14px;"> {{ $item->date }}</span>
                                </div>
                                <div class="row">

                                    <div class="col-8" style = "border-bottom: 2px solid var(--bs-b-color)!important; margin-right: 15px;">
                                        <div class="d-flex flex-column justify-content-between h-100">

                                        <h4 style=" ">
                                            {{ $item->title }}
                                        </h4>
                                        <div
                                            style="display: flex; gap: 450px; center; margin-bottom: 10px;">
                                            <div style="font-size: 14px; color: #c9d1d9;">Like: 12<br>Author Name</div>
                                            <div style="display: flex; gap: 10px; margin-right: 110px; margin-top: 20px;">
                                                share
                                                <div style="width: 18px; height: 18px; background-color: #3084ff;"></div>
                                                <div style="width: 18px; height: 18px; background-color: #3084ff;"></div>
                                                <div style="width: 18px; height: 18px; background-color: #3084ff;"></div>
                                            </div>
                                        </div>
                                        </div>

                                    </div>


                                    {{-- <img src="{{ asset('/public/uploads/news/' . $item->feature_image) }}"> --}}
                                    <div class="col-4" style="background: #d1d5db00; height: 220px; width: 320px;">
                                        <img src="{{ asset('/public/theme/assets/largecar.jpg') }}"
                                        style="height: 100%; width: 100%; object-fit: cover">
                                    </div>
                                </div>



                                <p style="line-height: 1.7; color: #d1d5db;margin-top: 30px;">{!! $item->description !!}</p>

                                <form action="{{ route('news.togglePin', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <div class="d-flex align-items-center gap-3" style="margin-top: 20px;">
                                        <button
                                            class="btn btn-sm {{ $user->pinnedNews->contains($item->id) ? 'btn-danger' : 'btn-outline-primary' }}"
                                            style="padding: 6px 14px; font-size: 14px; border-radius: 4px;">
                                            {{ $user->pinnedNews->contains($item->id) ? 'Unpin' : 'Pin' }}
                                        </button>

                                    </div>
                                </form>
                            </div>
                        @endforeach
                        <div id="news-placeholder" class="text-muted">
                            <p>Click a news item to view details here...</p>
                        </div>
                    </div>
                </div>



@endsection

@section('js')
    <script>
        function showNews(id) {
            document.querySelectorAll('.news-full-content').forEach(el => el.style.display = 'none');
            document.getElementById('news-placeholder').style.display = 'none';
            const selected = document.getElementById('news-' + id);
            if (selected) selected.style.display = 'block';
        }
    </script>
@endsection
