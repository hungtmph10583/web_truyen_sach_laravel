@extends('layouts.admin.app')
@section('title', 'Edit Chapter')
@section('subheader__title', 'Edit Chapter')
@section('content')
<div class="m-content">
    <!--Begin::Section-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Edit Chapter
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" class="m-form m-form--fit m-form--label-align-right">
        @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Chapter of the story</label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <select class="form-control m-select2 m-select2-general" name="c_story_id">
                            <option></option>
                            @foreach($stories as $story)
                                <option value="{{$story->id}}" {{ $story->id == $chapter->c_story_id ? 'selected' : '' }}>{{$story->s_name}}</option>
                            @endforeach
                        </select>
                        @error('c_story_id')
                            <span class="form__help text-danger mt-2">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Chapter name</label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <input type="text" class="form-control m-input" name="c_name" value="{{ $chapter->c_name }}" placeholder="Enter chapter name">
                        @error('c_name')
                            <span class="form__help text-danger mt-2">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Default Demo</label>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <textarea name="c_content" class="summernote" id="m_summernote_1">{{ $chapter->c_content }}</textarea>
                        @error('c_content')
                            <span class="form__help text-danger mt-2">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Chapter content</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="c_content" class="form-control" data-provide="markdown" rows="10">{{ $chapter->c_content }}</textarea>
                        @error('c_content')
                            <span class="form__help text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div> -->
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-brand">Save Chapter</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
    <!--End::Section-->
</div>
@endsection
@section('pagejs')
<!-- <script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin-theme/assets/demo/default/custom/header/actions.js')}}" type="text/javascript"></script> -->
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/summernote.js' )}}" type="text/javascript"></script>
@endsection