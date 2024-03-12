@extends('layouts.admin.app')
@section('title', 'List Chapter')
@section('subheader__title', 'List Chapter')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')
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
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
								List Chapter
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('chapter.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                    <span>Thêm chapter mới</span>
                                </a>
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
                                        <span style="width: 50px;">#</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 200px;">NAME</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 200px;">STORY</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 110px; float: right;">ACTIONS</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body">
                                @foreach($chapters as $key => $item)
                                <tr class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell">
                                        <span style="width: 50px;">
                                            {{( ($chapters->currentPage()-1)*20) + $loop->iteration }}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span class="d-inline-block text-truncate" style="width: 200px;">
                                            {{$item->c_name}}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span class="m--font-accent" style="width: 200px;">
                                            {{ $item->story->s_name }}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px; float: right;">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('chapter.show', [$item->story->s_slug, $item->c_slug]) }}">View</a>
                                                    <a class="dropdown-item" href="{{ route('chapter.edit', [$item->c_slug]) }}">Edit</a>
                                                    <a class="dropdown-item delete_chapter" href="javascript:void(0);" data-href="{{ route('chapter.destroy', [$item->id]) }}" title="Delete">Delete</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                            {{ $chapters->links('vendor.pagination.custom') }}
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
<script>
    var deleteLinks = document.querySelectorAll('.delete_chapter');
    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();
            var url = this.getAttribute('data-href');
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this chapter!",
                type:"warning",showCancelButton:!0,
                confirmButtonText:"Yes, delete this chapter!"
            }).then(function(e){
                e.value&&swal("Deleted!","This chapter has been deleted.","success")
                if (e.value) {
                    window.location.href = url;
                }
            })
        });
    }
</script>
@endsection
