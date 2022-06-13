<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  @include('includes.style')
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">  
  @stack('add-on-style')
</head>
<body>
  @include('includes.header')
  
  <main id="mainRoot">
    @include('includes.aside')
    <main id="mainContent">
      @yield('content')
    </main>
  </main>

  @include('includes.script')
  @stack('add-on-script')
</body>
</html>