@extends('admin.partial.app')
@push('title') News @endpush
@section('css')
    <style>
    .news-wrapper {
        display: flex;
    }
    .news-list {
        width: 20%;
        border-right: 1px solid #ddd;
        padding-right: 20px;
        max-height: 80vh;
        overflow-y: auto;
    }
    .news-detail {
        width: 80%;
        padding-left: 20px;
    }
</style>
@endsection

@section('content')
    
<div class="container-xxl container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>📰 News</h5>
            <form method="GET" action="{{ route('news.index') }}">
                <label>
                    <input type="checkbox" name="pinned" value="1" onchange="this.form.submit()" {{ request('pinned') ? 'checked' : '' }}>
                    Show only pinned
                </label>
            </form>
        </div>
        <div class="card-body">
            <div class="news-wrapper">
                {{-- 📋 Left side: News List --}}
                <div class="news-list">
                    @foreach($news as $item)
                        <div class="mb-3 pb-2 border-bottom">
                            <h6 style="cursor: pointer;" onclick="showNews({{ $item->id }})">
                                {{ $item->title }}
                            </h6>
                            <small class="text-muted">Posted on: {{ $item->date }}</small>

                        </div>
                    @endforeach
                </div>

                {{-- 📖 Right side: Expanded Content --}}
                <div class="news-detail">
                    @foreach($news as $item)
                        <div id="news-{{ $item->id }}" class="news-full-content" style="display: none;">
                            <h4>{{ $item->title }}</h4>
                            <img src="{{ asset('/public/uploads/news/' . $item->feature_image) }}">
                            <p>{!! $item->description !!}</p>
                            <form action="{{ route('news.togglePin', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm {{ $user->pinnedNews->contains($item->id) ? 'btn-danger' : 'btn-outline-primary' }}">
                                    {{ $user->pinnedNews->contains($item->id) ? 'Unpin' : 'Pin' }}
                                </button>
                            </br>
                                <small class="text-muted">Posted on: {{ $item->date }}</small>
                            </form>
                        </div>
                    @endforeach
                    <div id="news-placeholder" class="text-muted">
                        <p>Click a news item to view details here...</p>
                    </div>
                </div>
            </div>
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