@extends('layouts.client.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="breadcrumb__links">
                        <a href="{{ route('client.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="{{ route('client.story', [$story->s_slug]) }}">{{ $story->s_name ?? "N/A" }}</a>
                        <span class="chapter_name">{{ $chapter->c_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details">
        <div class="container content__chapter">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text__story--title">{{ $story->s_name ?? "N/A" }}</h3>
                    <h5 class="text-center text__chapter--title mt-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg>
                        <span class="chapter_name">{{ $chapter->c_name ?? "N/A" }}</span>
                    </h5>
                    <div class="mb-5 mt-3">
                        <div class="row">
                            <div class="col text-right">
                                <!-- <a @if($chapter->c_slug == $p_chapter) href="#" class="btn btn-info disabled" @else url-href="{{route('api.chapter', [$story->s_slug, $p_chapter->c_slug])}}" href="javascript:void(0);" class="btn btn-info prev_chapter" @endif>Chương trước</a> -->
                                <a 
                                @if($chapter->c_slug == $p_chapter) 
                                    href="javascript:void(0);" class="btn btn-info disabled" 
                                @else 
                                    href="{{route('client.chapter', [$story->s_slug, $p_chapter->c_slug])}}" class="btn btn-info" 
                                @endif>Chương trước</a>
                            </div>
                            <div class="col-4 p-0">
                                <select name="select_chapter" class="custom_select_chapters select_chapter" id="select_chapter">
                                    @foreach($chapters as $item)
                                        <option value="{{route('client.chapter', [$story->s_slug, $item->c_slug])}}">{{ $item->c_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col text-left">
                                <!-- <a @if($chapter->c_slug == $n_chapter) href="#" class="btn btn-info disabled" @else url-href="{{route('api.chapter', [$story->s_slug, $n_chapter->c_slug])}}" href="javascript:void(0);" class="btn btn-info next_chapter" @endif>Chương sau</a> -->
                                <a @if($chapter->c_slug == $n_chapter) 
                                    href="javascript:void(0);" class="btn btn-info disabled"
                                @else 
                                    href="{{route('client.chapter', [$story->s_slug, $n_chapter->c_slug])}}" class="btn btn-info" 
                                @endif>Chương sau</a>
                            </div>
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
                        <div class="col text-right">
                            <!-- <a @if($chapter->c_slug == $p_chapter) href="#" class="btn btn-info disabled" @else url-href="{{route('api.chapter', [$story->s_slug, $p_chapter->c_slug])}}" href="javascript:void(0);" class="btn btn-info prev_chapter" @endif>Chương trước</a> -->
                            <a 
                            @if($chapter->c_slug == $p_chapter) 
                                href="javascript:void(0);" class="btn btn-info disabled" 
                            @else 
                                href="{{route('client.chapter', [$story->s_slug, $p_chapter->c_slug])}}" class="btn btn-info" 
                            @endif>Chương trước</a>
                        </div>
                        <div class="col-4 p-0">
                            <select name="select_chapter" class="custom_select_chapters select_chapter" id="select_chapter">
                                @foreach($chapters as $item)
                                    <option value="{{route('client.chapter', [$story->s_slug, $item->c_slug])}}">{{ $item->c_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col text-left">
                            <!-- <a @if($chapter->c_slug == $n_chapter) href="#" class="btn btn-info disabled" @else url-href="{{route('api.chapter', [$story->s_slug, $n_chapter->c_slug])}}" href="javascript:void(0);" class="btn btn-info next_chapter" @endif>Chương sau</a> -->
                            <a @if($chapter->c_slug == $n_chapter) 
                                href="javascript:void(0);" class="btn btn-info disabled"
                            @else 
                                href="{{route('client.chapter', [$story->s_slug, $n_chapter->c_slug])}}" class="btn btn-info" 
                            @endif>Chương sau</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
@section('script')
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
    
    // $('.prev_chapter').click(function() {
    //     const url_prev_chapter = $(this).attr('url-href');
    //     console.log(url_prev_chapter);
    //     $.ajax({
    //         type: 'GET',
    //         url: url_prev_chapter,
    //         success: function(response) {
    //             console.log(response);
    //             let originalText = response.data.chapter_content.c_content;
    //             alteredText = originalText.replaceAll('\r\n', '<br>' );

    //             if (typeof(response.data.prev_chapter)  === 'string') {
    //                 console.log('string');
    //             }else{
    //                 console.log('object');
    //             }

    //             window.history.pushState("","",'http://127.0.0.1:8000/truyen/'+ response.data.chapter_story_info.s_slug + '/' + response.data.chapter_content.c_slug);
    //             $('.chapter_name').text(response.data.chapter_content.c_name)
    //             current_chapter();
    //             $('.story__read__chapter').html(alteredText);
    //             $('.prev_chapter').attr({'url-href': 'http://127.0.0.1:8000/api/truyen/'+ response.data.chapter_story_info.s_slug + '/' + response.data.prev_chapter.c_slug});
    //             $('.next_chapter').attr({'url-href': 'http://127.0.0.1:8000/api/truyen/'+ response.data.chapter_story_info.s_slug + '/' + response.data.next_chapter.c_slug});

    //         },
    //         error: function(){
    //             // Handle if there is an error here
    //         }
    //     })
    // });

    // $('.next_chapter').click(function() {
    //     const url_next_chapter = $(this).attr('url-href');
    //     console.log(url_next_chapter);
    //     $.ajax({
    //         type: 'GET',
    //         url: url_next_chapter,
    //         success: function(response) {
    //             console.log(response);
    //             let originalText = response.data.chapter_content.c_content;
    //             alteredText = originalText.replaceAll('\r\n', '<br>' );
                
    //             window.history.pushState("","",'http://127.0.0.1:8000/truyen/'+ response.data.chapter_story_info.s_slug + '/' + response.data.chapter_content.c_slug);
    //             $('.chapter_name').text(response.data.chapter_content.c_name)
    //             current_chapter();
    //             $('.story__read__chapter').html(alteredText);
    //             $('.prev_chapter').attr({'url-href': 'http://127.0.0.1:8000/api/truyen/'+ response.data.chapter_story_info.s_slug + '/' + response.data.prev_chapter.c_slug});
    //             $('.next_chapter').attr({'url-href': 'http://127.0.0.1:8000/api/truyen/'+ response.data.chapter_story_info.s_slug + '/' + response.data.next_chapter.c_slug});
    //         },
    //         error: function(){
    //             // Handle if there is an error here
    //         }
    //     })
    // });
</script>
@endsection