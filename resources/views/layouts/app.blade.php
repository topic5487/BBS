<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'BBS')</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body>
  {{--自定義route_class--}}
  <div id="app" class="{{ route_class() }}-page">

    @include('layouts._header')

    <div class="container">

      @include('shared._messages')

      @yield('content')

    </div>

    @include('layouts._footer')
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 {!! NoCaptcha::renderJs() !!}
</body>

</html>
