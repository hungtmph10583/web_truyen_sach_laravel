<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  {{ isset($activeDashboard) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('dashboard.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Dashboard</span>
                            <!-- <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">2</span>
                            </span> -->
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Story</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  {{ isset($activeStory) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('story.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon la la-book"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Story management</span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu {{ isset($activeCategory) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-sitemap"></i>
                    <span class="m-menu__link-text">Categories</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item {{ isset($activeCategoryList) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('category.index')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Category List</span>
                            </a>
                        </li>
                        <li class="m-menu__item {{ isset($activeCategoryAdd) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('category.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add New Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu {{ isset($activeChapter) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la la-list"></i> <span class="m-menu__link-text">Chapters</span> <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Chapter</span></span></li>
                        <li class="m-menu__item {{ isset($activeChapterList) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('chapter.index')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Chapter Information</span>
                            </a>
                        </li>
                        <li class="m-menu__item {{ isset($activeChapterAdd) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('chapter.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add New Chapter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu {{ isset($activeAuthor) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-users"></i> <span class="m-menu__link-text">Authors</span> <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Authors</span></span></li>
                        <li class="m-menu__item {{ isset($activeAuthorList) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('author.index')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Author Information</span>
                            </a>
                        </li>
                        <li class="m-menu__item {{ isset($activeAuthorAdd) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{route('author.create')}}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add New Author</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu {{ isset($activeUserManagement) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon la la-shield"></i>
                    <span class="m-menu__link-text">User Management</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                            <span class="m-menu__link"><span class="m-menu__link-text">User Management</span></span>
                        </li>
                        <li class="m-menu__item  {{ isset($activeUser) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('user.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">Users</span>
                            </a>
                        </li>
                        <li class="m-menu__item  {{ isset($activeRole) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('role.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">Roles</span>
                            </a>
                        </li><li class="m-menu__item  {{ isset($activePermission) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('permission.index') }}" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">Permission</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <!-- END: Aside Menu -->
</div>