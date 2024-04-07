@extends('layouts.admin.app')
@section('title', 'Story Information')
@section('subheader__title', 'Story Information')
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
                            Thông tin truyện
                        </div>
                        <div class="text-center mb-4">
                            <img src="{{ $story->s_thumbnail }}" alt="">
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $story->s_name }}</span>
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
                                        <span class="m-nav__link-badge">
                                            {{ $story->author->a_name ?? "Unknow" }}
                                        </span>
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
                                    <h3 class="m-widget1__title">Member Profit</h3>
                                    <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-brand">+$17,800</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Orders</h3>
                                    <span class="m-widget1__desc">Weekly Customer Orders</span>
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
                                    <span class="m-widget1__desc">System bugs and issues</span>
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
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Story Information
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Chapters
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <form class="m-form m-form--fit m-form--label-align-right">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <div class="m-list-search">
                                            <div class="m-list-search__results">
                                                <span class="m-list-search__result-category m-list-search__result-category--first">
                                                    Main Information
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{ $story->s_name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Author</label>
                                    <div class="col-7">
                                        <input class="form-control m-input" type="text" value="{{ $story->author->a_name ?? 'Unknow' }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Status</label>
                                    <div class="col-7">
                                        <div class="form-control">
                                            <span class="m-badge m-badge--{{ $story->getStatus($story->s_status)['class'] }} m-badge--dot"></span>
                                            <span class="m--font-{{ $story->getStatus($story->s_status)['class'] }}">{{ $story->getStatus($story->s_status)['name'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Categories</label>
                                    <div class="col-7">
                                        @if(!$story->storyCategory->isEmpty())
                                            @foreach($story->categories as $_item)
                                                <span class="m-badge m-badge--default m-badge--wide mr-2 mb-2">{{ $_item->c_name ?? "[N\A]" }}</span>
                                            @endforeach
                                        @else
                                            <span class="m-badge m-badge--default m-badge--wide">[N\A]</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                <div class="form-group m-form__group row">
                                    <div class="col-10 ml-auto">
                                        <div class="m-list-search">
                                            <div class="m-list-search__results">
                                                <span class="m-list-search__result-category m-list-search__result-category--first">
                                                Additional information
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Total Chapter</label>
                                    <div class="col-7">
                                        <div class="form-control">
                                            <span class="m--font-accent }}">{{ $story->s_total_chapter }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Description</label>
                                    <div class="col-7">
                                        <div class="m-scrollable m-scroller ps ps--active-y" style="padding: 20px; margin: 10px 0 30px 0; border: 4px solid #efefef" data-scrollable="true" style="height: 200px; overflow: hidden;">
                                            <div class="form-group m-form__group p-1">
                                                {{ $story->s_description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="m_user_profile_tab_2">
                        <div class="m-portlet__body">
                            <div class="m-section__content">
                                <div class="m-demo">
                                    <div class="m-demo__preview">
                                        <div class="m-list-search">
                                            <div class="m-list-search__results">
                                                <span class="m-list-search__result-category m-list-search__result-category--first">
                                                    Danh Sách Chapters
                                                </span>
                                                @if($chapters->isEmpty())
                                                    <span class="m-list-search__result-message">
                                                        No record found
                                                    </span>
                                                @endif
                                                @foreach($chapters as $key => $item)
                                                    <a href="{{ route('chapter.show', [$story->s_slug, $item->c_slug]) }}" class="m-list-search__result-item">
                                                        <span class="m-list-search__result-item-icon"><i class="flaticon-share m--font-success"></i></span>
                                                        <span class="m-list-search__result-item-text">{{ $item->c_name }}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End::Section-->
</div>
@endsection
@section('pagejs')
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/autosize.js')}}" type="text/javascript"></script>
@endsection