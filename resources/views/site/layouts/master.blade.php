<!DOCTYPE html>
@php

$lang = LaravelLocalization::getCurrentLocale();
@endphp
<html lang="{{ $lang }}" dir='{{ $lang == 'en' ? 'ltr' : 'rtl' }}' >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $data['settings']->site_name }} </title>
    <link rel="stylesheet" href="{{ asset('site_assets/css/main.css') }}">
    @if ($lang == 'ar')
    <link rel="stylesheet" href="{{ asset('site_assets/css/ar-main.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('site_assets/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('site_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site_assets/css/owl.theme.default.min.css') }}">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- start the header -->
    @include('site.layouts.header')
    <!-- end the header -->


    @yield('page_content')


    @include('site.layouts.footer')
    <!-- scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.js') }}" defer></script>
    {{-- <script src="{{ asset('site_assets/js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('site_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site_assets/js/owl.carousel.min.js') }}"></script>
    @if ($lang == 'en')
    <script src="{{ asset('site_assets/js/main.js') }}"></script>
    @else
    <script src="{{ asset('site_assets/js/ar-main.js') }}"></script>
    @endif


    @include('board.layouts.messages')

</body>
</html>