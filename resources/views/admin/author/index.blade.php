@extends('layouts.admin.app')
@section('title', 'Author List')
@section('subheader__title', 'Author List')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__body">
                    <!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <!-- <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span><i class="la la-search"></i></span>
                                            </span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a href="{{route('author.create')}}" class="btn btn-brand m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add Author</span>
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
                        <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                            <thead class="m-datatable__head">
                                <tr class="m-datatable__row">
                                    <th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 200px;">NAME</span>
                                    </th>
                                    <th data-field="Latitude" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 300px;">NUMBER STORY</span>
                                    </th>
                                    <th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort">
                                        <span style="width: 150px;">CREATED DATE</span>
                                    </th>
                                    <th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort text-right">
                                        <span style="width: 110px; float: right;">ACTIONS</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body" style="">
                                @foreach($authors as $item)
                                <tr class="m-datatable__row" style="left: 0px;">
                                    <td data-field="OrderID" class="m-datatable__cell">
                                        <span style="width: 200px;">
                                            <span class="text-capitalize">{{ $item->a_name }}</span>
                                        </span>
                                    </td>
                                    <td data-field="Type" class="m-datatable__cell">
                                        <span style="width: 300px;">
                                            @if($item->stories_count <= 0)
                                                <p class="m--font-bold m--font-secondary"><mark>This author does not have any stories</mark></p>
                                            @else
                                                <span class="m-badge m-badge--secondary m-badge--wide m-badge--rounded mb-2">{{ $item->stories_count }}</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td data-field="ShipDate" class="m-datatable__cell">
                                        <span style="width: 150px;">{{ $item->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td data-field="Actions" class="m-datatable__cell text-right">
                                        <span style="overflow: visible; position: relative; width: 110px; float: right;">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('author.edit', [$item->id]) }}" title="Edit">Edit</a>
                                                    <a class="dropdown-item delete_author" href="javascript:void(0);" data-href="{{ route('author.destroy', [$item->id]) }}" title="Delete">Delete</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                            {{ $authors->links('vendor.pagination.custom') }}
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
@section('pagejs')
<!-- <script src="{{ asset('admin-theme/assets/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}" type="text/javascript"></script> -->
<script type="text/javascript">
    var deleteLinks = document.querySelectorAll('.delete_author');
    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();
            var url = this.getAttribute('data-href');
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this author!",
                type:"warning",showCancelButton:!0,
                confirmButtonText:"Yes, delete this author!"
            }).then(function(e){
                e.value&&swal("Deleted!","This author has been deleted.","success")
                if (e.value) {
                    window.location.href = url;
                }
            })
        });
    }
</script>
@endsection