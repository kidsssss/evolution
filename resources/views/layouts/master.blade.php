<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/bootstrap.css')}}">
  <script type="text/javascript" scr="{{URL::to('src/js/bootstrap.js')}}"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{URL::to('src/css/main.css')}}">
  <script type="text/javascript" src="{{URL::to('src/js/scripts.js')}}"></script>
  <script src="https://use.fontawesome.com/e0998d5f5b.js"></script>
  @yield('styles')
</head>
<body>
  @include('includes.header')
    @if(Session::has('message'))
          <div class="alert alert-{{Session::get('type')}}">
            {{Session::get('message')}}
          </div>
        @endif
  @yield('content')

  @include('includes.footer')

  @yield('scripts')
</body>
</html>