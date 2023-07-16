<!doctype html>
<html lang="ar" dir="rtl" >
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title> لوحه تحكم الموقع </title>
  <!-- CSS files -->
  <link href="{{ asset('board_assets/dist/css/tabler.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-flags.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-payments.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/tabler-vendors.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/css/demo.rtl.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.css') }}" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    a , p , h1 , h2, h3 , h4 , h5 , h6 , span , div , table , form , button , th , tr , td , thead , tbody  {
      font-family: 'Cairo', sans-serif !important;
      font-weight: bold;
    }
  </style>
  <link rel="stylesheet" href="sweetalert2.min.css">
  @livewireStyles
  @yield('styles')

</head>
<body >
  <script src="{{ asset('board_assets/dist/js/demo-theme.min.js') }}"></script>
  <div class="page">
    <!-- Navbar -->
    @include('board.layouts.header')

    
    <div class="page-wrapper">

     @yield('page_content')

     @include('board.layouts.footer')
   </div>
 </div>
 <script src="{{ asset('board_assets/dist/js/tabler.min.js') }}" defer></script>
 <script src="{{ asset('board_assets/dist/js/demo.min.js') }}" defer></script>
 {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
 <script src="{{ asset('board_assets/dist/js/sweetalert2.min.js') }}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="{{ asset('board_assets/dist/libs/jquery-toast/dist/jquery.toast.min.js') }}" defer></script>
 @include('board.layouts.messages')
 @livewireScripts
 @yield('scripts')
</body>
</html>