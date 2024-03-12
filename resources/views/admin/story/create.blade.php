@extends('layouts.admin.app')
@section('title', 'Add New Story')
@section('subheader__title', 'Add New Story')
@section('content')
<div class="m-content">
    <!-- <div class="alert alert-brand m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-exclamation-1"></i>
        </div>
        <div class="m-alert__text">
            jQuery Idle Timer fires a custom event when the user is "idle". To learn more please check out
            <a href="https://github.com/thorst/jquery-idletimer" class="m-link m-link--warning m--font-bold" target="_blank">
                the plugin's official homepage
            </a>
        </div>
    </div> -->
    <!--Begin::Section-->
    <div class="m-portlet m-portlet--mobile ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Add New Story
                    </h3>
                </div>
            </div>
        </div>
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
        @csrf
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Main information of the story</h3>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Story name</label>
                        <div class="col-lg-6">
                            <input type="text" name="s_name" class="form-control m-input" value="{{ old('s_name') }}" placeholder="Enter the story's name">
                            @error('s_name')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Categoties</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <select name="sc_stories_categories[]" class="form-control m-bootstrap-select m_selectpicker" multiple data-actions-box="true">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->c_name}}</option>
                                @endforeach
                            </select>
                            @error('sc_stories_categories')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="m-form__seperator m-form__seperator--dashed"></div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Author of the story</label>
                        <div class="col-lg-6">
                            <input type="text" name="s_author_id" class="form-control m-input" value="{{ old('s_author_id') }}" placeholder="Enter the story's name">
                            @error('s_author_id')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>  
                    </div>
                    <div class="m-form__seperator m-form__seperator--dashed"></div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Thumbnail of the story</label>
                        <div class="col-lg-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadImage" name="s_thumbnail">
                                <label class="custom-file-label" for="Chọn file">Select file image</label>
                            </div>
                            @error('s_thumbnail')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-4"></label>
                        <div class="col-lg-4">
                            <img src="" class="img-fluid" id="preImage" alt="Thumbnail" >
                        </div>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--last">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Additional information</h3>
                    </div>
                    <div class="m-form__group form-group row">
                        <label class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-6">
                            <div class="m-radio-inline">
                                <label class="m-radio m-radio--solid">
                                    <input type="radio" name="s_status" checked value="1"> Đã hoàn tất
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--solid">
                                    <input type="radio" name="s_status" value="0"> Đang tiến hành
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-6">
                            <textarea name="s_description" class="form-control" data-provide="markdown" rows="10">{{ old('s_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- <button type="reset" class="btn btn-danger">Delete</button> -->
                        </div>
                        <div class="col-lg-3 m--align-right">
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add new story</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--End::Section-->
</div>
@endsection
@section('pagejs')
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin-theme/assets/demo/default/custom/crud/forms/widgets/bootstrap-markdown.js')}}" type="text/javascript"></script>
<script>
    const uploadImage = $('#uploadImage');
    const preImage = $('#preImage');

    preImage.hide();

    uploadImage.change(function (e) {
        file = this.files[0];
        preImage.show();
        if (e.target.files.length) {
            let reader = new FileReader();
            reader.onload = function (event) {
                preImage.attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection