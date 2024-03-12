@extends('layouts.admin.app')
@section('title', 'List of stories')
@section('subheader__title', 'List of stories')
@section('content')
<div class="m-content">
@include('layouts.admin.alert')
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--mobile ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            List of stories
                            </h3>
                        </div> -->
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{route('story.create')}}" class="btn btn-primary m-btn m-btn--icon">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add New Story</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form class="m-form m-form--fit m--margin-bottom-20" method="GET">
                        <div class="row m--margin-bottom-20">
                            <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                                <label>Search</label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}} @endisset">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                                <label>Author</label>
                                <select class="form-control m-input" data-col-index="2">
                                    <option value="">Select</option>
                                    <option value="" selected>Jiraiya</option>
                                </select>
                            </div>
                            <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                                <label>Category</label>
                                <select class="form-control m-input" data-col-index="2">
                                    <option value="">Select</option>
                                </select>
                            </div> -->
                        </div>
                        <!-- <div class="row m--margin-bottom-20">
                            <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                                <label>Status</label>
                                <select class="form-control m-input" data-col-index="6">
                                    <option value="">Select</option>
                                    <option value="">Đang tiến hành</option>
                                    <option value="">Đã hoàn thành</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="m-separator m-separator--md m-separator--dashed"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-brand m-btn m-btn--icon" id="m_search">
                                    <span>
                                        <i class="la la-search"></i>
                                        <span>Search</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
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
                                        <span style="width: 140px;">AUTHOR</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 90px;">CHAPTERS</span>
                                    </th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 250px">CATEGORIES</span>
                                    </th>
                                    <th class="m-datatable__cell"><span style="width: 130px;">STATUS</span></th>
                                    <th class="m-datatable__cell">
                                        <span style="width: 110px;">ACTIONS</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="m-datatable__body">
                                @foreach($stories as $key => $item)
                                <tr class="m-datatable__row" style="left: 0px;">
                                    <td class="m-datatable__cell">
                                        <span style="width: 50px;">
                                            {{( ($stories->currentPage()-1)*10) + $loop->iteration }}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span class="d-inline-block text-truncate" style="width: 200px;">
                                            {{$item->s_name}}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span class="d-inline-block text-truncate" style="width: 140px;">
                                            {{ $item->author->a_name ?? "[N\A]" }}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span class="m--font-{{ $item->getStatus($item->s_status)['class'] }}" style="width: 90px;">
                                            {{ $item->s_total_chapter }}
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span style="width: 250px">
                                            @if(!$item->storyCategory->isEmpty())
                                                @foreach($item->categories as $_item)
                                                    <span class="m-badge m-badge--default m-badge--wide m-badge--rounded mr-2 mb-2">{{ $_item->c_name ?? "[N\A]" }}</span>
                                                @endforeach
                                            @else
                                                <span class="m-badge m-badge--default m-badge--wide">[N\A]</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span style="width: 130px">
                                            <span class="m-badge m-badge--{{ $item->getStatus($item->s_status)['class'] }} m-badge--dot"></span>
                                            <span class="m--font-bold m--font-{{ $item->getStatus($item->s_status)['class'] }}">{{ $item->getStatus($item->s_status)['name'] }}</span>
                                        </span>
                                    </td>
                                    <td class="m-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 110px; float: right;">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('story.show', [$item->s_slug]) }}">View</a>
                                                    <a class="dropdown-item" href="{{ route('story.edit', [$item->s_slug]) }}">Edit</a>
                                                    <a class="dropdown-item delete_story" href="javascript:void(0);" data-href="{{ route('story.destroy', [$item->id]) }}" title="Delete">Delete</a>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
                            {{ $stories->links('vendor.pagination.custom') }}
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
<!-- <script src="{{ asset('admin-theme/assets/demo/default/custom/crud/datatables/search-options/advanced-search.js')}}" type="text/javascript"></script> -->
<script>
    var deleteLinks = document.querySelectorAll('.delete_story');
    for (var i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function(event) {
            event.preventDefault();
            var url = this.getAttribute('data-href');
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this story!",
                type:"warning",showCancelButton:!0,
                confirmButtonText:"Yes, delete this story!"
            }).then(function(e){
                e.value&&swal("Deleted!","This story has been deleted.","success")
                if (e.value) {
                    window.location.href = url;
                }
            })
        });
    }

</script>
@endsection