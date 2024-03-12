@extends('layouts.client.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('client.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>{{ $story->s_name }}</span>
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
                <div class="col-lg-9 col-md-12">
                    <div class="anime__details__content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="anime__details__pic set-bg" data-setbg="{{ $story->s_thumbnail }}">
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="anime__details__text">
                                    <div class="anime__details__title">
                                        <h3>{{ $story->s_name }}</h3>
                                        <span>
                                            <b>Tác giả: </b>
                                            <a href="#">{{ $story->author->a_name }}</a>
                                        </span>
                                    </div>
                                    <div class="anime__details__rating">
                                        <div class="rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                                        </div>
                                        <span>1.029 Votes</span>
                                    </div>
                                    <div class="anime__details__widget">
                                        <ul>
                                            <li><span>Tình trạng:</span> {{ $story->getStatus($story->s_status)['name'] }}</li>
                                            <li><span>Luợt xem:</span> 2.210</li>
                                            <li><span>Thể loại:</span> @foreach($story->categories as $category) <a href="{{ route('client.category', [$category->c_slug]) }}" class="category">{{ $category->c_name ?? "[N\A]" }}</a> @endforeach</li>
                                            <li><span>Lần cuối:</span> {{ $story->updated_at->format('d/m/Y') }}</li>
                                            <li><span>Lượt xem:</span> 9141</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <div class="section-title">
                                    <h5>Tóm tắt</h5>
                                </div>
                                <div class="anime__details__text">
                                    <p class="description">
                                        {!! nl2br($story->s_description) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Danh sách chương</h5>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('client-theme/img/anime/review-1.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('client-theme/img/anime/review-2.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('client-theme/img/anime/review-3.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('client-theme/img/anime/review-4.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('client-theme/img/anime/review-5.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('client-theme/img/anime/review-6.jpg') }}" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                    </div> -->
                    
                    <div class="tab-content" id="directory" style="display: block;">
                        <ul class="chapter-list">
                            @foreach($chapters as $chapter)
                            <li><a href="{{ route('client.chapter', [$story->s_slug, $chapter->c_slug]) }}">{{ $chapter->c_name }}</a></li>
                            @endforeach
                            @if(empty($chapter))
                            <li><a href="#">Chương truyện chưa được cập nhật</a></li>
                            @endif
                        </ul>
                        <div class="chapter-pagination mb-5">
                            {{ $chapters->links('vendor.pagination.pagination_client') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="book-list mb-5">
                        <div class="section-title">
                            <h5>Thể loại truyện</h5>
                        </div>
                        <ul class="book-categories">
                            @foreach($categories as $category)
                            <li><a href="{{ route('client.category', [$category->c_slug]) }}">{{ $category->c_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>Truyện cùng tác giả</h5>
                        </div>
                        @foreach($authorStories as $authorStory)
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <a href="{{ route('client.story', $authorStory->s_slug) }}"><img src="{{ $authorStory->s_thumbnail }}" alt=""></a>
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <h5><a href="{{ route('client.story', $authorStory->s_slug) }}">{{ $authorStory->s_name }}</a></h5>
                                <ul>
                                    @foreach($authorStory->categories as $_c)
                                    <li>{{ $_c->c_name }}</li>
                                    @endforeach
                                </ul>
                                <span><i class="fa fa-eye"></i> 19.141 Lượt đọc</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection