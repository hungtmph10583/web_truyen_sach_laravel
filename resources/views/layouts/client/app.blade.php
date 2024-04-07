<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', "Xườn Sào Chua Ngọt")</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom fonts for this template-->
	@include('layouts.client.style')
    @yield('pagestyle')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
	@include('layouts.client.header')
    <!-- Header End -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('client.search') }}" autocomplete="off" class="" method="POST">
                    @csrf
                    <div class="search">
                        <input type="search" id="keywords" name="keyword" placeholder="Tìm kiếm truyện..." aria-label="Search">
                        <button type="submit" id="clickButtonSubmit">Tìm Kiếm</button>
                    </div>

                </form>
                <div id="search_ajax" class="search_ajax position-absolute"></div>
            </div>
        </div>
    </div>
    @yield('content')

<!-- Product Section End -->

<!-- Footer Section Begin -->
@include('layouts.client.footer')
<!-- Search model end -->

<!-- Js Plugins -->
@include('layouts.client.script')
@yield('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#keywords').keyup( function() {
        var keywords = $(this).val();
        if (keywords != '') {
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:"{{ url('/timkiem-ajax') }}",
                method:"POST",
                data:{keywords:keywords, _token:_token},
                success:function(data){
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });
        }else{
            $('#search_ajax').fadeOut();
        }
    });

    $(document).on('click', '.li_search_ajax', function(){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
        var button = document.getElementById('clickButtonSubmit');
        button.form.submit();
    });
</script>


</body>

</html>