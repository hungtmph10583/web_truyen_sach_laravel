@extends('layouts.admin.app')
@section('title', 'Add New Story')
@section('subheader__title', 'Add New Story')
@section('content')

@section('subheader__breadcrumbs')
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{ route('story.index') }}" class="m-nav__link">
            <span class="m-nav__link-text">List of stories</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <span class="m-nav__link-text">Create new story</span>
    </li>
@endsection
<div class="m-content">
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                    <i class="flaticon-share m--hide"></i>
                                    Story information
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                    Classify
                                </a>
                            </li>
                            <!-- <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                    Chapter
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="s_name">
                                        <span class="m--font-boldest">Story name<span class="m--font-danger">*</span></span>
                                    </label>
                                    <input type="text" name="s_name" id="s_name" class="form-control m-input" value="{{ old('s_name') }}" placeholder="Enter the story's name">
                                    @error('s_name')
                                        <span class="form__help text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                <div class="form-group m-form__group">
                                    <label for="uploadImage"><span class="m--font-boldest">Thumbnail</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="uploadImage" name="s_thumbnail">
                                        <label class="custom-file-label" for="Chọn file">Select file image</label>
                                    </div>
                                    @error('s_thumbnail')
                                        <span class="form__help text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="uploadPoster"><span class="m--font-boldest">Poster</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="uploadPoster" name="s_poster">
                                        <label class="custom-file-label" for="Chọn file">Select file image</label>
                                    </div>
                                    @error('s_poster')
                                        <span class="form__help text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                <div class="form-group m-form__group">
                                    <label for="s_description">
                                        <span class="m--font-boldest">Description</span>
                                    </label>
                                    <textarea name="s_description" id="s_description" class="form-control" data-provide="markdown" rows="10">{{ old('s_description') }}</textarea>
                                    @error('s_description')
                                        <span class="form__help text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_2">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="s_name">
                                        <span class="m--font-boldest">Author</span>
                                    </label>
                                    <input type="text" name="s_author_id" class="form-control m-input" value="{{ old('s_author_id') }}" placeholder="Enter the story's name">
                                    @error('s_author_id')
                                        <span class="form__help text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="s_name">
                                        <span class="m--font-boldest">Status</span>
                                    </label>
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
                                <div class="form-group m-form__group">
                                    <label class="col-form-label">
                                        <span class="m--font-boldest">Category<span class="m--font-danger">*</span></span>
                                    </label>
                                    <div class="m-checkbox-list">
                                        <div class="row">
                                            @foreach($categories as $item)
                                            <div class="col-4">
                                                <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                    <input type="checkbox" name="sc_stories_categories[]"> {{ $item->c_name }}
                                                    <span></span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('sc_stories_categories')
                                            <span class="form__help text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="m_user_profile_tab_3">
                            chapter
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-10 m--align-right">
                                    <a href="{{ route('story.index') }}" class="btn btn-secondary"><i class="la la-ban"></i> Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save story</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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