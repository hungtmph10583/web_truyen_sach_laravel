@extends('layouts.admin.app')
@section('title', 'Update User Details')
@section('subheader__title', 'Update User Details')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3 ml-auto col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            User Information
                        </div>
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                @if(empty($item->avatar))
                                    <img src="{{ asset( $user->avatar )}}" class="m--img-rounded m--marginless" id="preImage" style="width: 130px; height: 130px; overflow: hidden; object-fit: contain;" alt="" />
                                @else
                                    <img src="{{ asset('admin-theme/assets/app/media/img/bg/blank-image.svg')}}" class="m--img-rounded m--marginless" style="width: 130px; height: 130px; overflow: hidden; object-fit: contain;" alt="" />
                                @endif
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $user->name }}</span>
                            @foreach($user->roles as $role)
                                <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">{{ $role->name }}</span>
                            @endforeach
                            @if($user->roles->isEmpty())
                                <span class="m-badge m-badge--secondary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-secondary">This user does not have any roles</span>
                            @endif
                        </div>
                    </div>
                    <div class="m-portlet__body-separator"></div>
                    <div class="m-widget1 m-widget1--paddingless">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Account ID</h3>
                                    <span class="m-widget1__desc">ID-45453423</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Email</h3>
                                    <span class="m-widget1__desc">{{ $user->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Last Login</h3>
                                    <span class="m-widget1__desc">20 Dec 2024, 10:10 pm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 mr-auto col-lg-8">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                User Information
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
                <form method="POST" class="m-form m-form--label-align-right">
                @csrf
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Name<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control m-input" name="name" value="{{ $user->name }}" placeholder="Enter full name">
                                    <!-- <span class="m-form__help">Please enter your full name</span> -->
                                </div>
                                @error('name')
                                    <span class="form__help text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Email<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="email" class="form-control m-input" name="email" value="{{ $user->email }}" placeholder="Enter email">
                                </div>
                                @error('email')
                                    <span class="form__help text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Avatar</label>
                                <div class="col-lg-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="uploadImage" name="avatar">
                                        <label class="custom-file-label" for="Chọn file">Select file image</label>
                                    </div>
                                    @error('avatar')
                                        <span class="form__help text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="m-form__group form-group row">
                                <label class="col-lg-2 col-form-label">Role:</label>
                                <div class="col-lg-8">
                                    @if(Auth::user()->hasRole('Administrator'))
                                        <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
                                            <select class="form-control m-bootstrap-select m_selectpicker" name="role" data-live-search="true" tabindex="-98">
                                            <option value="">Do not grant a role to this user</option>
                                            @foreach($roles as $item)
                                                <option value="{{ $item->name }}" @foreach($user->roles as $role) @if($role->id == $item->id) selected @endif @endforeach>{{ $item->name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    @else
                                        @foreach($user->roles as $role)
                                            <input type="text" class="form-control m-input" value="{{ $role->name }}" disabled>
                                        @endforeach
                                        @if($user->roles->isEmpty())
                                            <span class="form-control">
                                                <span class="m-badge m-badge--secondary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-secondary">This user does not have any roles</span>
                                            </span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit row">
                        <div class="m-form__actions m-form__actions col-10 ml-auto">
                            <button type="submit" class="btn btn-primary">Save change</button>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>
        </div>
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