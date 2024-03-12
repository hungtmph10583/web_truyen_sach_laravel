<nav class="header__menu mobile-menu">
    <ul>
        <li class="active"><a href="{{ route('client.home') }}">Trang chủ</a></li>
        <li><a href="javascript:;">Danh sách <span class="arrow_carrot-down"></span></a>
            <ul class="dropdown">
                <li><a href="{{ route('client.filter', ['truyen-moi-cap-nhat']) }}">Truyện mới cập nhật</a></li>
                <li><a href="{{ route('client.filter', ['truyen-hot']) }}">Truyện Hot</a></li>
                <li><a href="{{ route('client.filter', ['truyen-full']) }}">Truyện Full</a></li>
                <li><a href="{{ route('client.filter', ['truyen-de-cu']) }}">Truyện đề cử</a></li>
                <li><a href="{{ route('client.filter', ['truyen-xem-nhieu-nhat']) }}">Xem nhiều</a></li>
            </ul>
        </li>
        <!-- <li><a href="#">Thể loại truyện</a></li>
        <li><a href="#">Contacts</a></li> -->
    </ul>
</nav>