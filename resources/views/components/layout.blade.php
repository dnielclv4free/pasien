<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    @include('dashboard') <!-- Include a navigation bar -->
    <div class="content">
    @yield('content') <!-- Placeholder for page-specific content -->
    </div>
</body>
</html>
