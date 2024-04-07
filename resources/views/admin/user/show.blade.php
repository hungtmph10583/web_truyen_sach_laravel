@extends('layouts.admin.app')
@section('title', 'View User Details')
@section('subheader__title', 'View User Details')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3 ml-auto col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            Your Profile
                        </div>
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                @if(empty($item->avatar))
                                    <img src="{{ asset( $user->avatar )}}" class="m--img-rounded m--marginless" style="width: 130px; height: 130px; overflow: hidden; object-fit: contain;" alt="" />
                                @else
                                    <img src="{{ asset('admin-theme/assets/app/media/img/bg/blank-image.svg')}}" class="m--img-rounded m--marginless" style="width: 130px; height: 130px; overflow: hidden; object-fit: contain;" alt="" />
                                @endif
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $user->name }}</span>
                            @foreach($user->roles as $role)
                                <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">{{ $role->name }}</span>
                            @endforeach
                            @if($user->roles->isEmpty())
                                <span class="m-badge m-badge--secondary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-secondary">This user does not have any roles</span>
                            @endif
                        </div>
                    </div>
                    <div class="m-portlet__body-separator"></div>
                    <div class="m-widget1 m-widget1--paddingless">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Account ID</h3>
                                    <span class="m-widget1__desc">ID-45453423</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Email</h3>
                                    <span class="m-widget1__desc">{{ $user->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Last Login</h3>
                                    <span class="m-widget1__desc">20 Dec 2024, 10:10 pm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 mr-auto col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Overview
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-portlet__nav-item--last">
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="#" class="m-portlet__nav-link btn btn-accent m-dropdown__toggle dropdown-toggle">
                                        <span>Actions</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav">
                                                        <li class="m-nav__section m-nav__section--first">
                                                            <span class="m-nav__section-text">Account</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{ route('user.edit', [$user->id]) }}" class="m-nav__link">
                                                                <i class="m-nav__link-icon fa fa-user-edit"></i>
                                                                <span class="m-nav__link-text">Update Account</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{ route('user.destroy', [$user->id]) }}" class="m-nav__link">
                                                                <i class="m-nav__link-icon fa fa-user-alt-slash"></i>
                                                                <span class="m-nav__link-text m--font-danger">Delete Customer</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit m--hide">
                                                        </li>
                                                        <li class="m-nav__item m--hide">
                                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_user_profile_tab_1">
                        <div class="m-form m-form--fit m-form--label-align-right">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group m--margin-top-10 m--hide">
                                    <div class="alert m-alert m-alert--default" role="alert">
                                        The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-6 mr-auto">
                                        <h3 class="m-form__section">Personal Details</h3>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                    <div class="col-9">
                                        <input class="form-control m-input" type="text" disabled value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                    <div class="col-9">
                                        <input class="form-control m-input" type="text" disabled value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Role</label>
                                    <div class="col-9">
                                        @foreach($user->roles as $role)
                                        <span class="form-control">
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">{{ $role->name }}</span>
                                        </span>
                                        @endforeach
                                        @if($user->roles->isEmpty())
                                        <span class="form-control">
                                            <span class="m-badge m-badge--secondary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-secondary">This user does not have any roles</span>
                                        </span>
                                        @endif
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
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
@endsection