@extends('layouts.admin.app')
@section('title', 'Chapter Information')
@section('subheader__title', 'Chapter Information')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')

    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            Chapter Information
                        </div>
                        <div class="text-center mb-4">
                            <img src="{{ $story->s_thumbnail }}" alt="">
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $story->s_name }}</span>
                            <!-- <a href="" class="m-card-profile__email m-link">{{ $story->author->a_name }}</a> -->
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">Section</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="../header/profile&amp;demo=default.html" class="m-nav__link">
                                <i class="m-nav__link-icon fa fa-user-edit"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Author</span>
                                        <span class="m-nav__link-badge d-inline-block text-truncate"style="width: 150px;">{{ $story->author->a_name }}</span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <div class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-share"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Status</span>
                                        <span class="m-nav__link-badge">
                                            <span class="m-badge m-badge--{{ $story->getStatus($story->s_status)['class'] }} m-badge--dot"></span>
                                            <span class="m--font-{{ $story->getStatus($story->s_status)['class'] }}">{{ $story->getStatus($story->s_status)['name'] }}</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </li>
                        <li class="m-nav__item">
                            <div class="m-nav__link">
                                <i class="m-nav__link-icon fa fa-eye"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Views</span>
                                        <span class="m--font-success">+17,800</span>
                                    </span>
                                </span>
                            </div>
                        </li>
                        <li class="m-nav__item">
                            <div class="m-nav__link">
                                <i class="m-nav__link-icon fa fa-comment-dots"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Comments</span>
                                        <span class="m--font-warning">+1,800</span>
                                    </span>
                                </span>
                            </div>
                        </li>
                        <li class="m-nav__item">
                            <div class="m-nav__link">
                                <i class="m-nav__link-icon la la-square-o"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">Total Votes</span>
                                        <span class="m--font-danger">800 vote</span>
                                    </span>
                                </span>
                            </div>
                        </li>
                        <li class="m-nav__item">
                            <div class="m-nav__link">
                                <i class="m-nav__link-icon la la-star-half"></i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text text-warning">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star-half-o"></i>
                                            <i class="la la-star-o"></i>
                                            <i class="la la-star-o"></i>
                                        </span>
                                        <span class="m--font-warning">5.5</span>
                                    </span>
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="m-portlet__body-separator"></div>
                    <div class="m-widget1 m-widget1--paddingless">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">View</h3>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-brand">+17,800</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Comments</h3>
                                    <!-- <span class="m-widget1__desc">Weekly Customer Orders</span> -->
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-danger">+1,800</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Issue Reports</h3>
                                    <!-- <span class="m-widget1__desc">System bugs and issues</span> -->
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-success">-27,49%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__body">
                    <h3 class="m-section__heading text-center mb-3">{{ $story->s_name }}</h3>
                    <h4 class="m-section__heading text-center mb-3">{{ $chapter->c_name }}</h4>
                    <div class="m-section__content">
                        <p class="lead">
                            {!! nl2br($chapter->c_content) !!}
                            <!-- {!! $chapter->c_content !!} -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End::Section-->
</div>
@endsection