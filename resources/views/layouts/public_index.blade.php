<!DOCTYPE html>
<html lang="en">
@include('layouts.public_partials.header_links')
<body>
@include('layouts.public_partials.header')
@include('layouts.public_partials.navbar')
<div class="page-content">
  @yield('content')
</div>
</body>
@include('layouts.public_partials.footer_link')