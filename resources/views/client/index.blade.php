@extends('layouts.client.app')
@section('content')
<!-- Hero Section Begin -->
    <!-- <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{ asset('client-theme/img/hero/hero-1.jpg') }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('client-theme/img/hero/hero-1.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{ asset('client-theme/img/hero/hero-1.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>TRUYỆN HOT</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('client.filter', ['truyen-hot']) }}" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($hot_stories as $h_story)
                            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <div class="product__item">
                                    <a href="{{ route('client.story', [$h_story->s_slug]) }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $h_story->s_thumbnail }}">
                                            <div class="hot">HOT</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{ $h_story->author->a_name }}</li>
                                        </ul>
                                        <h5><a href="{{ route('client.story', [$h_story->s_slug]) }}">{{ $h_story->s_name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>TRUYỆN MỚI CẬP NHẬT</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('client.filter', ['truyen-moi-cap-nhat']) }}" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($new_stories as $n_story)
                            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $n_story->s_thumbnail }}">
                                        <div class="new">NEW</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{ $n_story->author->a_name }}</li>
                                        </ul>
                                        <h5><a href="#">{{ $n_story->s_name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>TRUYỆN ĐÃ HOÀN THÀNH</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="{{ route('client.filter', ['truyen-full']) }}" class="primary-btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($full_stories as $f_story)
                            <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $f_story->s_thumbnail }}">
                                        <div class="full">FULL</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Chương 120</li>
                                        </ul>
                                        <h5><a href="#">{{ $f_story->s_name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
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
                    <div class="product__sidebar__comment">
                        <div class="section-title">
                            <h5>TRUYỆN ĐỀ CỬ</h5>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <a href="{{ route('client.story', $find->s_slug) }}"><img src="{{ $find->s_thumbnail }}" alt=""></a>
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <h5><a href="{{ route('client.story', $find->s_slug) }}">{{ $find->s_name }}</a></h5>
                                <ul>
                                    @foreach($find->categories as $_c)
                                    <li>{{ $_c->c_name }}</li>
                                    @endforeach
                                </ul>
                                <span><i class="fa fa-eye"></i> 19.141 Lượt đọc</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset('client-theme/img/sidebar/comment-2.jpg') }}" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset('client-theme/img/sidebar/comment-3.jpg') }}" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <img src="{{ asset('client-theme/img/sidebar/comment-4.jpg') }}" alt="">
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <ul>
                                    <li>Active</li>
                                    <li>Movie</li>
                                </ul>
                                <h5><a href="#">Monogatari Series: Second Season</a></h5>
                                <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
@section('script')

@endsection