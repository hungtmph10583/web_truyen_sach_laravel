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
                <!-- <div class="m-portlet__body table-responsive">
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                            <tr>
                                <th>Người dùng</th>
                                <th>Vai trò</th>
                                <th>Lần đăng nhập cuối</th>
                                <th>Ngày tham gia</th>
                                <th>Trạng thái</th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Admin</td>
                                <td>
                                    <span class="m-badge m-badge--secondary m-badge--wide">3 ngày trước</span>
                                </td>
                                <td>29 Tháng 1 2024</td>
                                <td><span class="m-badge m-badge--success m-badge--wide">Hoạt động</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hành động
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                            <a class="dropdown-item" href="#">Chi tiết</a>
                                            <a class="dropdown-item" href="#">Sửa</a>
                                            <a class="dropdown-item" href="#">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Người dùng</td>
                                <td>
                                    <span class="m-badge m-badge--secondary m-badge--wide">1 tuần trước</span>
                                </td>
                                <td>31 Tháng 1 2024</td>
                                <td><span class="m-badge m-badge--danger m-badge--wide">Dừng hoạt động</span></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hành động
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                            <a class="dropdown-item" href="#">Chi tiết</a>
                                            <a class="dropdown-item" href="#">Sửa</a>
                                            <a class="dropdown-item" href="#">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Người dùng</td>
                                <td>
                                    <span class="m-badge m-badge--secondary m-badge--wide">5 năm trước</span>
                                </td>
                                <td>29 Tháng 6 2027</td>
                                <td>
                                    <span class="m-badge m-badge--success m-badge--wide">Hoạt động</span>
                                </td>
                                <td class="float-end">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Hành động
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                            <a class="dropdown-item" href="#">Chi tiết</a>
                                            <a class="dropdown-item" href="#">Sửa</a>
                                            <a class="dropdown-item" href="#">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
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
                                                <div class="dropdown bootstrap-select form-control m-bootstrap-select">
                                                    <select class="form-control m-bootstrap-select" id="m_form_status" tabindex="-98">
                                                        <option value="">All</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Delivered</option>
                                                        <option value="3">Canceled</option>
                                                    </select>
                                                    <button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="m_form_status" title="All">
                                                        <div class="filter-option">
                                                            <div class="filter-option-inner">All</div>
                                                        </div>&nbsp;<span class="bs-caret"><span class="caret"></span></span>
                                                    </button>
                                                    <div class="dropdown-menu " role="combobox">
                                                        <div class="inner show" role="listbox" aria-expanded="false" tabindex="-1">
                                                            <ul class="dropdown-menu inner show"></ul>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="dropdown bootstrap-select form-control m-bootstrap-select"><select class="form-control m-bootstrap-select" id="m_form_type" tabindex="-98">
                                                    <option value="">All</option>
                                                    <option value="1">Online</option>
                                                    <option value="2">Retail</option>
                                                    <option value="3">Direct</option>
                                                </select><button type="button" class="btn dropdown-toggle bs-placeholder btn-light" data-toggle="dropdown" role="button" data-id="m_form_type" title="All"><div class="filter-option"><div class="filter-option-inner">All</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu " role="combobox"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1"><ul class="dropdown-menu inner show"></ul></div></div></div>
                                            </div>
                                        </div>
                                        <div class="d-md-none m--margin-bottom-10"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="la la-cart-plus"></i>
                                        <span>Thêm người dùng mới</span>
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
                        <table class="m-datatable__table"
                            style="display: block; min-height: 300px; overflow-x: auto;">
                            <thead class="m-datatable__head">
                                <tr class="m-datatable__row">
                                    <th data-field="RecordID"
                                        class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                        <span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox">&nbsp;<span></span></label></span>
                                    </th>
                                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 220px;">USER</span>
                                    </th>
                                    <th data-field="Latitude" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">ROLE</span>
                                    </th>
                                    <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">LAST LOGIN</span>
                                    </th>
                                    <th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">Cấp độ</span>
                                    </th>
                                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">Joined Date</span>
                                    </th>
                                    <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 110px;">ACTIONS</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body" style="">
                                <tr data-row="0" class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="2">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-danger"><span>M</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Master</span>
                                                    <a href="" class="m-card-user__email m-link">hungtmp10583@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Administrator</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">3 ngày trước</span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">Hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell">
                                        <span style="width: 110px;">5/21/2016</span>
                                    </td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown "> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="1" class="m-datatable__row m-datatable__row--even"
                                    style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="2">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-info"><span>V</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Văn Việt</span>
                                                    <a href="" class="m-card-user__email m-link">nguyenvanviet@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Administrator</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell"><span
                                            style="width: 110px;">2 giờ trước</span></td>
                                            <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">Hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell"><span
                                            style="width: 110px;">4/19/2016</span></td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown "> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="2" class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="3">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-brand"><span>D</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Đình Dũng</span>
                                                    <a href="" class="m-card-user__email m-link">ledinhdung@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Administrator</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell"><span
                                            style="width: 110px;">1 tuần trước</span></td>
                                            <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">Hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell"><span
                                            style="width: 110px;">4/7/2016</span></td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown "> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="3" class="m-datatable__row m-datatable__row--even"
                                    style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="4">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-metal"><span>T</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Thu Trang</span>
                                                    <a href="" class="m-card-user__email m-link">damthithhutrang@gmail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Support</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">30 phút trước</span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">Hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell">
                                        <span style="width: 110px;">2/15/2016</span>
                                    </td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown "> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="4" class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="5">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-danger"><span>C</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Khánh Linh</span>
                                                    <a href="" class="m-card-user__email m-link">khanhlinh20052003@gmail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Developer</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">5 năm trước</span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--wide">Chăn hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell">
                                        <span style="width: 110px;">1/30/2017</span>
                                        </td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown "> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="5" class="m-datatable__row m-datatable__row--even"
                                    style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="6">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-metal"><span>H</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Mỹ Hạnh</span>
                                                    <a href="" class="m-card-user__email m-link">truonmyhanh31012001@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Customer</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">1 phút trước</span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--mental m-badge--wide">Chặn hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell">
                                        <span style="width: 110px;">10/22/2016</span>
                                    </td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown "> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="6" class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="7">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-secondary"><span>L</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Mraz Chettoe</span>
                                                    <a href="" class="m-card-user__email m-link">mrazlics@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Customer</span>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Customer</span>
                                        </span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--wide">Chăn hoạt động</span></span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">5 năm trước</span>
                                    </td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown dropup"> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="7" class="m-datatable__row m-datatable__row--even"
                                    style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="8">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-primary"><span>K</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Kessiah Chettoe</span>
                                                    <a href="" class="m-card-user__email m-link">chettoe@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 110px;">
                                            <span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Customer</span>
                                        </span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell">
                                        <span style="width: 110px;">5 năm trước</span>
                                    </td>
                                    <td data-field="Status" class="m-datatable__cell">
                                        <span style="width: 110px;"><span class="m-badge m-badge--danger m-badge--wide">Chăn hoạt động</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell"><span
                                            style="width: 110px;">2/10/2016</span></td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown dropup"> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="8" class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="9">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-warning"><span>S</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Stokes Clamp</span>
                                                    <a href="" class="m-card-user__email m-link">clamp@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell"><span
                                            style="width: 110px;"><span
                                                class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                class="m--font-bold m--font-accent">Trial</span></span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell"><span
                                            style="width: 110px;">-8.2137</span></td>
                                    <td data-field="Status" class="m-datatable__cell"><span
                                            style="width: 110px;"><span
                                                class="m-badge  m-badge--metal m-badge--wide">Delivered</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell"><span
                                            style="width: 110px;">11/11/2016</span></td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown dropup"> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                                <tr data-row="9" class="m-datatable__row m-datatable__row--even"
                                    style="left: 0px;">
                                    <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"
                                        data-field="RecordID"><span style="width: 50px;"><label
                                                class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input
                                                    type="checkbox"
                                                    value="10">&nbsp;<span></span></label></span></td>
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 220px;">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="m-card-user__pic">
                                                    <div class="m-card-user__no-photo m--bg-fill-primary"><span>G</span></div>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">Gusti Clamp</span>
                                                    <a href="" class="m-card-user__email m-link">stork@mail.com</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell"><span
                                            style="width: 110px;"><span
                                                class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span
                                                class="m--font-bold m--font-primary">Trial</span></span>
                                    </td>
                                    <td data-field="Latitude" class="m-datatable__cell"><span
                                            style="width: 110px;">4.6375</span></td>
                                    <td data-field="Status" class="m-datatable__cell"><span
                                            style="width: 110px;"><span
                                                class="m-badge  m-badge--danger m-badge--wide">Danger</span></span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell"><span
                                            style="width: 110px;">12/15/2016</span></td>
                                    <td data-field="Actions" class="m-datatable__cell"><span
                                            style="overflow: visible; position: relative; width: 110px;">
                                            <div class="dropdown dropup"> <a href="#"
                                                    class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                    data-toggle="dropdown"> <i
                                                        class="la la-ellipsis-h"></i> </a>
                                                <div class="dropdown-menu dropdown-menu-right"> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-edit"></i> Edit Details</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-leaf"></i> Update Status</a> <a
                                                        class="dropdown-item" href="#"><i
                                                            class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </div> <a href="#"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View "> <i class="la la-edit"></i> </a>
                                        </span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                            <ul class="m-datatable__pager-nav">
                                <li><a title="First"
                                        class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled"
                                        data-page="1" disabled="disabled"><i
                                            class="la la-angle-double-left"></i></a></li>
                                <li><a title="Previous"
                                        class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled"
                                        data-page="1" disabled="disabled"><i
                                            class="la la-angle-left"></i></a></li>
                                <li style="display: none;"><a title="More pages"
                                        class="m-datatable__pager-link m-datatable__pager-link--more-prev"
                                        data-page="1"><i class="la la-ellipsis-h"></i></a></li>
                                <li style="display: none;"><input type="text"
                                        class="m-pager-input form-control" title="Page number"></li>
                                <li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active"
                                        data-page="1" title="1">1</a></li>
                                <li><a class="m-datatable__pager-link m-datatable__pager-link-number"
                                        data-page="2" title="2">2</a></li>
                                <li><a class="m-datatable__pager-link m-datatable__pager-link-number"
                                        data-page="3" title="3">3</a></li>
                                <li><a class="m-datatable__pager-link m-datatable__pager-link-number"
                                        data-page="4" title="4">4</a></li>
                                <li><a class="m-datatable__pager-link m-datatable__pager-link-number"
                                        data-page="5" title="5">5</a></li>
                                <li><a class="m-datatable__pager-link m-datatable__pager-link-number"
                                        data-page="6" title="6">6</a></li>
                                <li><a title="More pages"
                                        class="m-datatable__pager-link m-datatable__pager-link--more-next"
                                        data-page="7"><i class="la la-ellipsis-h"></i></a></li>
                                <li><a title="Next"
                                        class="m-datatable__pager-link m-datatable__pager-link--next"
                                        data-page="2"><i class="la la-angle-right"></i></a></li>
                                <li><a title="Last"
                                        class="m-datatable__pager-link m-datatable__pager-link--last"
                                        data-page="10"><i class="la la-angle-double-right"></i></a></li>
                            </ul>
                            <div class="m-datatable__pager-info">
                                <span class="m-datatable__pager-detail">Displaying 1 - 10 of 100 records</span>
                            </div>
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