<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/bootstrap.theme.min.css" />
    <link rel="stylesheet" href="/css/jquery-ui.css" />
    <link rel="stylesheet" href="/css/jquery.multiselect.css" />
    <link rel="stylesheet" href="/css/jquery.multiselect.filter.css" />
    <link rel="stylesheet" href="/css/sweetalert2-bs4.css" />
    <link rel="stylesheet" href="/css/buttons.dataTables.css" />
    <link rel="stylesheet" href="/css/searchBuilder.css" />
    <link rel="stylesheet" href="/css/datarangepicker.css">
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/theme.css" />
    <link rel="stylesheet" href="/css/buttons.css" />
</head>
<body>
    @yield('body')

    @yield('scripts')
    
</body>
</html>