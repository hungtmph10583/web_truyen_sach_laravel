@extends('layouts.admin.app')
@section('title', 'Add New User')
@section('subheader__title', 'Add New User')
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
                                Add User
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form method="POST" action="" class="m-form m-form--fit m-form--label-align-right">
                    @csrf
                    <div class="m-portlet__body">
                        <!-- <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                For even more customization and cross browser consistency, use our completely custom form elements to replace the browser defaults. They’re built on top of semantic and accessible markup, so they’re solid replacements for any default
                                form control.
                            </div>
                        </div> -->
                        <div class="form-group m-form__group">
                            <label for="avatar"><span class="m--font-boldest">Avatar</span></label>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <img style="width: 125px; height: 125px; object-fit: cover;" id="preImage" src="{{ asset('admin-theme/assets/app/media/img/bg/blank-image.svg')}}" alt="">
                                </div>
                            </div>
                            <span class="m-form__help">Allowed file types: png, jpg, jpeg.</span>
                        </div>
                        <div class="form-group m-form__group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadImage" name="avatar">
                                <label class="custom-file-label" for="Chọn file">Select file image</label>
                            </div>
                            @error('avatar')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <label for="name"><span class="m--font-boldest">Name <span class="text-danger">*</span></span></label>
                            <input type="text" class="form-control m-input m-input--square mb-1" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                            @error('name')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group m-form__group">
                            <label for="email"><span class="m--font-boldest">Email <span class="text-danger">*</span></span></label>
                            <input type="text" class="form-control m-input m-input--square mb-1" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <span class="form__help text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!-- <div class="form-group m-form__group">
                            <label><span class="m--font-boldest">Role <span class="text-danger">*</span></span></label>
                            <div class="m-radio-list">
                                <label class="m-radio m-radio--brand">
                                    <input type="radio" name="role" value="2"> <strong>Administrator</strong>
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--brand">
                                    <input type="radio" name="role" value="2"> <strong>Developer</strong>
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--brand">
                                    <input type="radio" name="role" value="2"> <strong>Support</strong>
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--brand">
                                    <input type="radio" name="role" value="2"> <strong>Trail</strong>
                                    <span></span>
                                </label>
                                <label class="m-radio m-radio--brand">
                                    <input type="radio" name="role" value="2" checked> <strong>Not Role</strong>
                                    <span></span>
                                </label>
                            </div>
                        </div> -->
                        <div class="form-group m-form__group">
                            <label><span class="m--font-boldest">Role <span class="text-danger">*</span></span></label>
                            <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
                                <select class="form-control m-bootstrap-select m_selectpicker" name="role" data-live-search="true" tabindex="-98">
                                <option value="" class="m--hide">Nothing selected</option>
                                @foreach($roles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                                </select>
                            </div>
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
<script>
    const uploadImage = $('#uploadImage');
    const preImage = $('#preImage');

    

    uploadImage.change(function (e) {
        file = this.files[0];
        
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