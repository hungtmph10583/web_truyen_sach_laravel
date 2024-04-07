@extends('layouts.client.app')
@section('content')
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
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                                            <div class="view"><i class="fa fa-eye"></i> {{ $h_story->s_view }}</div>
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
                                    <a href="{{ route('client.story', [$n_story->s_slug]) }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $n_story->s_thumbnail }}">
                                            <div class="new">NEW</div>
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                                            <div class="view"><i class="fa fa-eye"></i> {{ $n_story->s_view }}</div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{ $n_story->author->a_name }}</li>
                                        </ul>
                                        <h5><a href="{{ route('client.story', [$n_story->s_slug]) }}">{{ $n_story->s_name }}</a></h5>
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
                                    <a href="{{ route('client.story', [$f_story->s_slug]) }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $f_story->s_thumbnail }}">
                                            <div class="full">FULL</div>
                                            <!-- <div class="comment"><i class="fa fa-comments"></i> 11</div> -->
                                            <div class="view"><i class="fa fa-eye"></i> {{ $f_story->s_view }}</div>
                                        </div>
                                    </a>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Chương 120</li>
                                        </ul>
                                        <h5><a href="{{ route('client.story', [$f_story->s_slug]) }}">{{ $f_story->s_name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 sidebar__category">
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
                        @foreach($recommends as $recommend)
                        <div class="product__sidebar__comment__item">
                            <div class="product__sidebar__comment__item__pic">
                                <a href="{{ route('client.story', $recommend->s_slug) }}"><img loading="lazy" src="{{ $recommend->s_thumbnail }}" alt=""></a>
                            </div>
                            <div class="product__sidebar__comment__item__text">
                                <h5><a href="{{ route('client.story', $recommend->s_slug) }}">{{ $recommend->s_name }}</a></h5>
                                <ul>
                                    @foreach($recommend->categories as $_c)
                                    <li>{{ $_c->c_name }}</li>
                                    @endforeach
                                </ul>
                                <span><i class="fa fa-eye"></i> {{ $recommend->s_view }} Lượt đọc</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
@section('script')

@endsection