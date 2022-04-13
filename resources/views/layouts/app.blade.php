<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  @include('includes.style')
  <title>@yield('title')</title>
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