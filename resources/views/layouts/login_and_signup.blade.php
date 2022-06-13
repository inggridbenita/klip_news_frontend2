<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  <title>@yield('title')</title>
  @include('includes.style')
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/pages/login_and_signup.css">
</head>
<body>
  @yield('content')
  @include('includes.script')
  @stack('add-on-script')
</body>
</html>