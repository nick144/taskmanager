@props([
    'bodyCssClass' => '',
    'title' => '',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $title }} | {{ config('app.name', 'Laravel') }} </title>

    <!-- Bootstrap 5 CDN (optional, remove if you're using another CSS framework) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Styles (if any) -->
    @stack('styles')
</head>
<body @if($bodyCssClass)class="{{ $bodyCssClass }}"@endif>

    {{ $slot }}

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
