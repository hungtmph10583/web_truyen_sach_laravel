@extends('layouts.client.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('client.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="{{ route('client.story', [$story->s_slug]) }}">{{ $story->s_name }}</a>
                        <span>{{ $chapter->c_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-info">{{ $chapter->story->s_name ?? "N/A" }}</h3>
                    <h5 class="text-center text-light mt-2 mb-2">{{ $chapter->c_name }}</h5>
                    <div class="mb-5 mt-3">
                        <div class="row">
                            <div class="col text-right"><a href="{{route('client.chapter', [$story->s_slug, $p_chapter])}}" class="btn btn-info @if($chapter->c_slug === $p_chapter) disabled @endif">Chương trước</a></div>
                            <div class="col-4 p-0">
                                <select name="select_chapter" class="custom_select_chapters select_chapter" id="select_chapter">
                                    @foreach($chapters as $item)
                                        <option value="{{route('client.chapter', [$item->story->s_slug, $item->c_slug])}}">{{ $item->c_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col text-left"><a href="{{route('client.chapter', [$story->s_slug, $n_chapter])}}" class="btn btn-info @if($chapter->c_slug === $n_chapter) disabled @endif">Chương sau</a></div>
                        </div>
                    </div>
                    <div class="story__read__chapter">
                        {!! nl2br($chapter->c_content) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="row">
                        <div class="col text-right"><a href="{{route('client.chapter', [$story->s_slug, $p_chapter])}}" class="btn btn-info @if($chapter->c_slug === $p_chapter) disabled @endif">Chương trước</a></div>
                        <div class="col-4 p-0">
                            <select name="select_chapter" class="custom_select_chapters select_chapter" id="select_chapter">
                                @foreach($chapters as $item)
                                    <option value="{{route('client.chapter', [$item->story->s_slug, $item->c_slug])}}">{{ $item->c_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col text-left"><a href="{{route('client.chapter', [$story->s_slug, $n_chapter])}}" class="btn btn-info @if($chapter->c_slug === $n_chapter) disabled @endif">Chương sau</a></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content" id="directory" style="display: block;">
                        <ul class="chapter-list">
                            @foreach($chapters as $chapter)
                            <li><a href="{{ route('client.chapter', [$story->s_slug, $chapter->c_slug]) }}">{{ $chapter->c_name }}</a></li>
                            @endforeach
                        </ul>
                        <div class="chapter-pagination">
                            <ul>
                                <li class="prevs">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                                            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="prev">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">13</a></li>
                                <li class="next">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="nexts">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script type="text/javascript">
    $('.select_chapter').on('change',function() {
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
        return false;
    });

    current_chapter();

    function current_chapter(){
        var url = window.location.href;
        $('.select_chapter[name="select_chapter"]').find('option[value="'+url+'"]').attr("selected", true);

        $('.chapter-list').find('li a[href="'+url+'"]').addClass('active');
    }
</script>
@endsection