@extends('layouts.admin.app')
@section('title', 'Add New Role')
@section('subheader__title', 'Add New Role')
@section('content')
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Add a Role
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form method="POST" action="{{route('role.create')}}" class="m-form m-form--fit m-form--label-align-right">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="name"><span class="m--font-boldest">Role name <span class="text-danger">*</span></span></label>
                            <input type="text" class="form-control m-input m-input--square mb-1" id="name" name="name" placeholder="Enter role name" value="{{ old('name') }}">
                            @error('name')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <label><span class="m--font-boldest">Role Permissions</span></label>
                            <div></div>
                            <select name="permissions[]" class="form-control m-bootstrap-select m_selectpicker" multiple data-actions-box="true">
                                @foreach($permissions as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <!-- <div class="m-checkbox-list">
                                <div class="row">
                                    @foreach($permissions as $item)
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox" name="permission"> {{ $item->name }}
                                            <span></span>
                                        </label>
                                    </div>
                                    @endforeach
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox"> Create category
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox"> Edit category
                                        <span></span>
                                    </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox"> Delete category
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox"> Create story
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox"> Edit story
                                        <span></span>
                                    </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox"> Delete story
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox"> Create chapter
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                        <input type="checkbox"> Edit chapter
                                        <span></span>
                                    </label>
                                    </div>
                                    <div class="col-4">
                                        <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                            <input type="checkbox"> Delete chapter
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m--align-right">
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
    <!--End::Section-->
</div>
@endsection
@section('pagejs')
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
@endsection