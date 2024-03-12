@extends('layouts.admin.app')
@section('title', 'Edit Author')
@section('subheader__title', 'Add New Author')
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
                                Edit Author
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form method="POST" action="" class="m-form m-form--fit m-form--label-align-right">
                    @csrf
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="a_name"><span class="m--font-boldest">Author Name <span class="text-danger">*</span></span></label>
                            <input type="text" class="form-control m-input m-input--square mb-1" id="a_name" name="a_name" placeholder="Enter a author name" value="{{ $author->a_name }}">
                            @error('a_name')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <label for="a_name"><span class="m--font-boldest">Status <span class="text-danger">*</span></span></label>
                            <div class="m-radio-inline">
                                <label class="m-radio m-radio--solid">
                                    <input type="radio" name="a_status" {{ $author->a_status == 1 ? 'checked' : '' }} value="1" > Active
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--solid">
                                    <input type="radio" name="a_status" {{ $author->a_status == 0 ? 'checked' : '' }} value="0"> Inactive
                                    <span></span>
                                </label>
                            </div>
                            @error('a_status')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-4">
                                </div>
                                <div class="col-8 m--align-right">
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