<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    @include('partials.navbar') <!-- Include a navigation bar -->
    <div class="content">
    @yield('content') <!-- Placeholder for page-specific content -->
    </div>
</body>
</html>
