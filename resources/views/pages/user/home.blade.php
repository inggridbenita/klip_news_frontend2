<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.meta')
  @include('includes.style')
  <title>KLIP News</title>
  <link rel="stylesheet" href="/css/pages/user/home.css">
</head>
<body>
  @include('includes.header')
  <aside>
    <h1>Welcome</h1>
    <h2>Username</h2>
    <hr>
    <button id="btnLogout">Logout</button>
  </aside>
  @include('includes.script')
  <script src="/js/pages/user/home.js"></script>
</body>
</html>