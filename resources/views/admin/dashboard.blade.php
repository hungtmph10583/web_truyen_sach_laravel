@extends('layouts.admin.app')
@section('title', 'Welcome')
@section('content')
<div class="m-content">
    <div class="m-portlet">
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Total Story</h3>
                                    <!-- <span class="m-widget1__desc">Awerage Weekly Profit</span> -->
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-brand">{{ $total_story }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Total Chapter</h3>
                                    <!-- <span class="m-widget1__desc">Awerage IPO Margin</span> -->
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-accent">{{ $total_chapter }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Total Author</h3>
                                    <!-- <span class="m-widget1__desc">Awerage Weekly Orders</span> -->
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-success">{{ $total_author }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-8">
            <!--begin:: Widgets/Best Sellers-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Stories ({{ $total_story }})
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
                                    New Story
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
                                    Hot Story
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content" role="tab">
                                    Most viewed
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Content-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                @foreach($recently_added_stories as $item_ras)
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" loading="lazy" style="width: 5rem;" src="{{ $item_ras->s_thumbnail }}" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                {{ $item_ras->s_name }}
                                            </h4>
                                            <!-- <span class="m-widget5__desc">
                                                Make Metronic Great Again.Lorem Ipsum Amet
                                            </span> -->
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author-name">
                                                    {{ $item_ras->author->a_name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">{{ $item_ras->s_view }}</span><br>
                                            <span class="m-widget5__sales">views</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                @foreach($hot_stories as $item_hs)
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" loading="lazy" style="width: 5rem;" src="{{ $item_hs->s_thumbnail }}" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                {{ $item_hs->s_name }}
                                            </h4>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author-name">
                                                    {{ $item_hs->author->a_name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">{{ $item_hs->s_view }}</span><br>
                                            <span class="m-widget5__sales">views</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                @foreach($most_viewed_stories as $item_mvs)
                                <div class="m-widget5__item">
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__pic">
                                            <img class="m-widget7__img" loading="lazy" style="width: 5rem;" src="{{ $item_mvs->s_thumbnail }}" alt="">
                                        </div>
                                        <div class="m-widget5__section">
                                            <h4 class="m-widget5__title">
                                                {{ $item_mvs->s_name }}
                                            </h4>
                                            <div class="m-widget5__info">
                                                <span class="m-widget5__author">
                                                    Author:
                                                </span>
                                                <span class="m-widget5__info-author-name">
                                                    {{ $item_hs->author->a_name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget5__content">
                                        <div class="m-widget5__stats1">
                                            <span class="m-widget5__number">{{ $item_mvs->s_view }}</span><br>
                                            <span class="m-widget5__sales">views</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--end::m-widget5-->
                        </div>
                    </div>

                    <!--end::Content-->
                </div>
            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>
        <!-- <div class="col-xl-4">
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Audit Log
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab2_content" role="tab">
                                    Week
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget4_tab3_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget4_tab1_content">
                            <div class="m-scrollable" data-scrollable="true" data-height="400" style="height: 400px; overflow: hidden;">
                                <div class="m-list-timeline m-list-timeline--skin-light">
                                    <div class="m-list-timeline__items">
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span class="m-list-timeline__text">12 new users registered</span>
                                            <span class="m-list-timeline__time">Just now</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                            <span class="m-list-timeline__time">14 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                                            <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                            <span class="m-list-timeline__time">2 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                            <span class="m-list-timeline__text">Production server down</span>
                                            <span class="m-list-timeline__time">3 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">Production server up</span>
                                            <span class="m-list-timeline__time">5 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                            <span class="m-list-timeline__time">7 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span class="m-list-timeline__text">12 new users registered</span>
                                            <span class="m-list-timeline__time">Just now</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                            <span class="m-list-timeline__time">14 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--accent"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
                                            <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                            <span class="m-list-timeline__time">2 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                            <span class="m-list-timeline__text">Production server down</span>
                                            <span class="m-list-timeline__time">3 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--info"></span>
                                            <span class="m-list-timeline__text">Production server up</span>
                                            <span class="m-list-timeline__time">5 hrs</span>
                                        </div>
                                        <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                            <span class="m-list-timeline__time">7 hrs</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_widget4_tab2_content">
                        </div>
                        <div class="tab-pane" id="m_widget4_tab3_content">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!--End::Section-->
</div>
@endsection