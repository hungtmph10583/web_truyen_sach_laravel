@extends('layouts.admin.app')
@section('title', 'Update Permission')
@section('subheader__title', 'Update Permission')
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
                                Update Permission
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form method="POST" action="" class="m-form m-form--fit m-form--label-align-right">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="name"><span class="m--font-boldest">Permission Name <span class="text-danger">*</span></span></label>
                            <input type="text" class="form-control m-input m-input--square mb-1" id="name" name="name" placeholder="Enter a permission name" value="{{ $permission->name }}">
                            @error('name')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <div class="col-8">
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
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

@endsection