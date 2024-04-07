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
                                    <h4>{{ $heading }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($stories as $story)
                            <div class="col-6">
                                <div class="product__sidebar__comment__item">
                                    <div class="product__sidebar__comment__item__pic">
                                        <a href="{{ route('client.story', $story->s_slug) }}"><img src="{{ $story->s_thumbnail }}" alt=""></a>
                                    </div>
                                    <div class="product__sidebar__comment__item__text">
                                        <h5><a href="{{ route('client.story', $story->s_slug) }}">{{ $story->s_name }}</a></h5>
                                        <ul>
                                            @foreach($story->categories as $_c)
                                            <li>{{ $_c->c_name }}</li>
                                            @endforeach
                                        </ul>
                                        <span><i class="fa fa-eye"></i> {{ $story->s_view }} Lượt đọc</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="chapter-pagination">
                            {{ $stories->links('vendor.pagination.pagination_client') }}
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
                </div>
            </div>
        </div>
    </section>  
@endsection