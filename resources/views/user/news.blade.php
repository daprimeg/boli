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

            .share-icon {
        width: 36px;
        height: 36px;
        background-color: #3084ff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 6px;
        color: #fff;
        font-size: 18px;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .share-icon:hover {
        background-color: #1d6cd6;
        color: #ffffff;
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
                             <div class="d-flex justify-content-end mt-3 mb-3 me-5">
                                <div class="d-flex align-items-center gap-3 share-box">
                                    <span style="color: #ffffff; font-weight: 500; font-size: 14px;">Share:</span>

                                        @php
                                                $postUrl = urlencode(url('/news?id=' . $item->id)); 
                                            @endphp
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}" target="_blank" class="share-icon">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>

                                    <a href="https://twitter.com/intent/tweet?url={{ $postUrl }}" target="_blank" class="share-icon">
                                        <i class="fab fa-x-twitter"></i>
                                    </a>

                                    <!-- WhatsApp -->
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode(Request::url()) }}" 
                                    target="_blank" class="share-icon" title="Share on WhatsApp" 
                                    style="color: #25D366; font-size: 20px;">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>


                            </div>

                        </div>


                        <div class="col-4" style="background: #d1d5db00; height: 220px; width: 320px;">
                            <img src="{{ asset('public/uploads/news/' . $item->feature_image) }}" 
                                style="height: 100%; width: 100%; object-fit: cover">
                        </div>
                    </div>



                    <p style="line-height: 1.7; color: #d1d5db;margin-top: 30px;">{!! $item->description !!}</p>

                   
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
        var id = $(this).data('id');
        $('.news-full-content').hide();
        $('#news-placeholder').hide();
        $('.news-' + id).fadeIn();
    });


    let selectedId = "{{ $selectedId ?? '' }}";

    if (selectedId) {
        $('.news-item[data-id="' + selectedId + '"]').trigger('click');
    } else {
        $('.news-item').first().trigger('click');
    }
});

    </script>
@endsection
