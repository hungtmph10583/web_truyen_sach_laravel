<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('client.home') }}">
                            <img src="{{ asset('client-theme/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                    @include('layouts.client.navigate')
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"><span class="icon_profile pr-2"></span>{{ __('Login') }}</a>
                            @endif

                            <!-- @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif -->
                        @else
                            <a href="{{ route('dashboard.index') }}">Quản trị</a>
                            <a href="{{ route('logout') }}">Logout</a>
                        @endguest
                        <!-- <a href="./login.html"><span class="icon_profile"></span></a> -->
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>