@extends('layouts.admin.app')
@section('title', 'Users List')
@section('subheader__title', 'Users List')
@section('content')
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <!-- <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Users List
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                        <i class="la la-ellipsis-h m--font-brand"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav">
                                                        <li class="m-nav__section m-nav__section--first">
                                                            <span class="m-nav__section-text">Quick Actions</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                <span class="m-nav__link-text">Create Post</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                <span class="m-nav__link-text">Send Messages</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                <span class="m-nav__link-text">Upload File</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__section">
                                                            <span class="m-nav__section-text">Useful Links</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                                <span class="m-nav__link-text">FAQ</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-text">Support</span>
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
                </div> -->
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <!-- <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span><i class="la la-search"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-form__group m-form__group--inline">
                                            <div class="m-form__label">
                                                <label>Status:</label>
                                            </div>
                                            <div class="m-form__control">
                                                <select name="filter_status" class="form-control m-bootstrap-select m_selectpicker">
                                                    <option>All</option>
                                                    <option value="">Active</option>
                                                    <option value="">Unactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="m-form__group m-form__group--inline">
                                            <div class="m-form__label">
                                                <label class="m-label m-label--single">Role:</label>
                                            </div>
                                            <div class="m-form__control">
                                                <select name="filter_status" class="form-control m-bootstrap-select m_selectpicker">
                                                    <option>All</option>
                                                    <option value="">Administrator</option>
                                                    <option value="">Developer</option>
                                                    <option value="">Analyst</option>
                                                    <option value="">Support</option>
                                                    <option value="">Trial</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="{{ route('user.create') }}" class="btn btn-primary m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add User</span>
                                    </span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->
                    <!--begin: Datatable -->
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded"
                        id="local_data" style="">
                        <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                            <thead class="m-datatable__head">
                                <tr class="m-datatable__row">
                                    <th class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                        <span style="width: 50px;">
                                            #
                                        </span>
                                    </th>
                                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 220px;">USER</span>
                                    </th>
                                    <th data-field="Latitude" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 150px;">ROLE</span>
                                    </th>
                                    <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">LAST LOGIN</span>
                                    </th>
                                    <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">STATUS</span>
                                    </th>
                                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">JOINED DATA</span>
                                    </th>
                                    <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px; float: right;">ACTIONS</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body" style="">
                                @foreach($users as $item)
                                <tr class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                        <span style="width: 50px;">
                                            {{( ($users->currentPage()-1)*20) + $loop->iteration }}
                                        </span>
                                    </td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    @if(!empty($item->avatar))
                                                        <img src="{{ asset( $item->avatar )}}" class="m--img-rounded m--marginless" style="width: 40px; height: 40px; overflow: hidden; object-fit: contain;" alt="" />
                                                    @else
                                                        <div class="m-card-user__no-photo m--bg-fill-danger"><span>M</span></div>
                                                    @endif
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">{{ $item->name }}</span>
                                                    <a href="" class="m-card-user__email m-link">{{ $item->email }}</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 150px;">
                                            @foreach($item->roles as $role)
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">{{ $role->name }}</span>
                                            @endforeach
                                            @if($item->roles->isEmpty())
                                            <span class="m-badge m-badge--secondary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-secondary">Doesn't have roles</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">3 ngày trước</span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--{{ $item->getStatus($item->status)['class'] }} m-badge--wide">{{ $item->getStatus($item->status)['name'] }}</span>
                                        </span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            {{ $item->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <td data-field="Actions" class="m-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px; float: right;">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('user.view', [$item->id]) }}">View</a>
                                                    <a class="dropdown-item" href="{{ route('user.edit', [$item->id]) }}">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                            {{ $users->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                    <!--end: Datatable -->
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