@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 py-4">
            <h3>TRUYỆN HOT</h3>
        </div>
    </div>
	<div class="row">
        @foreach($stories as $item)
        <div class="col-6 col-md-4 col-lg-2 mb-2">
            <a href="{{ route('client.story', [$item->s_slug]) }}" class="nav-link mx-auto">
                <img src="{{ $item->s_thumbnail }}" class="img-fluid hover-shadow rounded mx-auto d-block" alt="">
                <h5 class="mt-3 fw-bold"><span>{{ $item->s_name }}</span></h5>
                <h6>{{ $item->created_at->diffForHumans() }}</h6>
            </a>
        </div>
        @endforeach
        <div class="col-lg-12 my-3">
            <a href="#" class="btn btn-outline-dark float-right">Xem danh sách truyện</a>
        </div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 py-4">
            <h3>MỚI CẬP NHẬT</h3>
        </div>
    </div>
	<div class="row">
        @foreach($new_stories as $n_item)
        <div class="col-6 col-md-4 col-lg-2 mb-2">
            <a href="{{ route('client.story', [$item->s_slug]) }}" class="nav-link">
                <img src="{{ $n_item->s_thumbnail }}" class="img-fluid hover-shadow rounded mx-auto d-block" alt="">
                <h5 class="mt-3 fw-bold"><span>{{ $n_item->s_name }}</span></h5>
                <h6>{{ $n_item->created_at->diffForHumans() }}</h6>
            </a>
        </div>
        @endforeach
	</div>
</div>
<div class="jumbotron text-center" style="margin-bottom: 50px;">
    <p>KAKEGURUI</p>
    <h1>Daily Web Design</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
            <h2>About Me</h2>
            <h5>Photo of Story:</h5>
            <div class="img"></div>
            <p>Some text about me in culpa qui offica deserunt nollit story...</p>
            <h3>Some Links</h3>
            <p>Lorem ipsum dolor sit story</p>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Active</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Link</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Link</a>
                </li>
            </ul>
            <hr class="d-sm-none">
		</div>
        <div class="col-sm-8">
            <h2>POPULAR ON STORY</h2>
            <h5>Title description, Dec 25, 2022</h5>
            <div class="img1"></div>
            <p>DEATH NOTE</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores magnam eveniet deserunt alias non consequatur nobis. Sequi, minima reiciendis odit magnam quos accusamus nostrum voluptatem corporis veniam error ea repudiandae.</p>
            <br>
            <h2>POPULAR ON STORY</h2>
            <h5>Title description, Dec 25, 2022</h5>
            <div class="img1"></div>
            <p>DEATH NOTE</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores magnam eveniet deserunt alias non consequatur nobis. Sequi, minima reiciendis odit magnam quos accusamus nostrum voluptatem corporis veniam error ea repudiandae.</p>
        </div>
	</div>
</div>
@endsection