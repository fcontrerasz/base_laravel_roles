@php
  if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) {
      header('Location: ./iexplorer');
      die();
  }
@endphp


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>

        body, html {
             height: 100%;

        }

    .bg { 
      background-image: url("img/fondo_img.jpg");
      height: 100%; 
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      overflow: hidden;
    }

    .white{
        color: white;
    }

    </style>

</head>

<body>
    <div class="bg">
       @yield('content')
   </div>
   <script>

    

   </script>
</body>
</html>
