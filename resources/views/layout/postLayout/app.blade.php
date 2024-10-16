<!doctype html>
<html lang="en">
<head>
    @include('layout.postLayout.head')
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    @include('layout.postLayout.navbar')
</nav>
<div>
    @yield('content')
</div>
@include('layout.postLayout.js')
</body>
</html>
