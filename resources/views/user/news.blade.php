@extends('admin.partial.app')
@push('title')
    News
@endpush
@section('css')
    <style>
        .news-list {
            width: 20%;
            overflow-y: auto !important;
            border-right: 1px solid var(--bs-b-color) !important;
            padding-right: 20px;
            height: 100vh;
            scrollbar-width: thin;
            /* Firefox ke liye */
            scrollbar-color: #0080ff #000f21;
            /* thumb and track color for Firefox */
        }

        /* Chrome, Edge, Safari ke liye */
        .news-list::-webkit-scrollbar {
            width: 8px;
        }

        .news-list::-webkit-scrollbar-track {
            background: #1a1a1a;
            border-radius: 10px;
        }




        .news-detail {
            width: 80%;
            padding: 30px;
            height: 100%;
            /* full height of screen */
        }

        .hover-news>div:hover {
            background-color: #001020;
            cursor: pointer;
        }

            {
            background-color: #001020;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex " style="background: #0f1c2d; height: 100%; !important ; ">
        {{-- 📋 Left side: News List --}}
        <div class="news-list col-4 hover-news">
            @foreach ($news as $iitem)
                <div class="mb-3 border-bottom news-item" style="padding: 20px; text-align-center"
                    data-id="{{ $iitem->id }}">
                    <h6 style="font-size: 18px; font-weight: 500; cursor: pointer;">
                        {{ $iitem->title }}
                    </h6>
                    <div class="d-flex justify-content-between">
                        <span
                            style="background-color: #00316b; color: white;padding:4px 12px; border-radius: 4px; font-size: 12px;">Category</span>
                        <small class="text-muted">
                            {{ $iitem->date }}</small>



                        {{-- <div style="font-size: 14px; color: #c9d1d9;">Like: 12</div> --}}

                    </div>
                </div>
            @endforeach
        </div>

        {{-- 📖 Right side: Expanded Content --}}
        <div class="news-detail col-7 ">

            @foreach ($news as $item)
                <div class="news-full-content news-{{ $item->id }}"
                    style="display: none; background-color: #001020;  color: #ffffff; padding: 50px; border-radius: 8px; margin-bottom: 24px; font-family: Arial, sans-serif;">
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <span
                            style="background-color: #00316b; color: white; padding:4px 12px; border-radius: 4px; font-size: 12px; margin-right: 12px;">Category</span>
                        <span style="color: #c9d1d9; font-size: 14px;"> {{ $item->date }}</span>
                    </div>
                    <div class="row">

                        <div class="col-8"
                            style = "border-bottom: 2px solid var(--bs-b-color)!important; margin-right: 15px;">
                            <div class="d-flex flex-column justify-content-between h-100">

                                <h4 style=" ">
                                    {{ $item->title }}
                                </h4>
                                <div style="display: flex; justify-content: flex-end !important; margin-bottom: 4px; ">
                                    {{-- <div style="font-size: 14px; color: #c9d1d9;">Like: 12</div> --}}
                                    <div
                                        style="display: flex; gap: 10px; margin-right: 110px; margin-top: 20px; align-items: center">
                                        share
                                        <div
                                            style="width: 30px; height: 30px; background-color: #3084ff; display: flex;justify-content: center; align-items: center">
                                            <a href="https://x.com"><i style="font-size: 25px;"
                                                    class="text-white fa-brands fa-x-twitter"></i> </a></div>
                                        <div
                                            style="width: 30px; height: 30px; background-color: #3084ff; display: flex;justify-content: center; align-items: center">
                                            <a href="https://www.instagram.com"><i style="font-size: 25px;"
                                                    class="text-white fa-brands fa-square-instagram"></i></a> </div>
                                        <div
                                            style="width: 30px; height: 30px; background-color: #3084ff; display: flex;justify-content: center; align-items: center">
                                            <a href=" https://telegram.org/"><i style="font-size:25px;"
                                                    class="text-white fa-brands fa-telegram"></i></a></div>
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
        $(document).ready(function() {
            $('.news-item').click(function() {
                debugger
                var id = $(this).data('id');

                // Hide all
                $('.news-full-content').hide();
                $('#news-placeholder').hide();

                // Show selected
                $('.news-' + id).fadeIn();
            });
        });
    </script>
@endsection
