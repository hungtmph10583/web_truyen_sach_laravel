@extends('layouts.admin.app')
@section('title', 'View Role Details')
@section('subheader__title', 'View Role Details')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__body">
                    <div class="m-form__heading mb-4">
                        <h3 class="m-form__heading-title">{{ $role->name }}</h3>
                    </div>
                    <div class="form-group m-form__group mb-5 p-1">
                        @foreach($role->permissions as $permission)
                                <p><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-secondary">{{ $permission->name }}</span></p>
                            @endforeach
                        @if($role->permissions->isEmpty())
                            <p class="m--font-bold m--font-secondary text-center"><mark>The role does not have any permissions</mark></p>
                        @endif
                    </div>
                    <div class="m-section m-section--last">
                        <div class="m-form__actions m-form__actions">
                            <a href="{{ route('role.edit', [$role->id]) }}" class="btn btn-secondary">Edit Role</a>
                            <!-- <a href="{{ route('role.destroy', [$role->id]) }}" class="btn btn-secondary">Delete Role</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Users Assigned <small class="text-muted"><strong>({{ count($users) }})</strong></small>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid" placeholder="Search Users">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                            <thead class="m-datatable__head">
                                <tr class="m-datatable__row">
                                    <th class="m-datatable__cell">
                                        <span style="width: 50px;" class="text-center">#</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 300px;">USER</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 150px;">JOINED DATE</span>
                                    </th>
                                    <th class="m-datatable__cell text-right">
                                        <span style="width: 110px;">ACTIONS</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body">
                                @foreach($users as $user)
                                    <tr class="m-datatable__row" style="left: 0px;">
                                        <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                                            <span style="width: 50px;">
                                                {{( ($users->currentPage()-1)*5) + $loop->iteration }}
                                            </span>
                                        </td>
                                        <td data-field="OrderID" class="m-datatable__cell">
                                            <span style="width: 300px;">
                                                <div class="m-card-user m-card-user--sm">
                                                    <div class="m-card-user__pic">
                                                        <div class="m-card-user__no-photo m--bg-fill-danger"><span>M</span></div>
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name">{{ $user->name }}</span>
                                                        <a href="" class="m-card-user__email m-link">{{ $user->email }}</a>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                        <td data-field="Latitude" class="m-datatable__cell">
                                            <span style="width: 150px;">{{ $user->created_at->format('d M Y, H:i a') }}</span>
                                        </td>
                                        <td data-field="Actions" class="m-datatable__cell">
                                            <span style="overflow: visible; position: relative; width: 110px; float: right;">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                        <a class="dropdown-item" href="{{ route('user.view', [$user->id]) }}">View</a>
                                                        <a class="dropdown-item" href="{{ route('role.destroyRoleUser', [$role->id, $user->id]) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($users->isEmpty())
                                <tr class="m-datatable__row">
                                    <td class="m-datatable__cell text-center">No record found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                            {{ $users->links('vendor.pagination.custom') }}
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