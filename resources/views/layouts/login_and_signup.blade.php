<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>@yield('title')</title>
  @include('includes.style')
  @stack('add-on-style')
  <link rel="stylesheet" href="/css/pages/login.css">
</head>
<body>
  @yield('content')
  @include('includes.script')
  @stack('add-on-script')
</body>
</html>