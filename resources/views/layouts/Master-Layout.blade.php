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
    @include('layouts.header')
    @yield('body')

    @include('layouts.footer')

    @yield('scripts')
    
    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.multiselect.js"></script>
    <script src="/js/jquery.multiselect.filter.js"></script>
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap5.min.js"></script>
    <script src="/js/searchBuilder.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/searchBuilder.bootstrap5.min.js"></script>
    <script src="/js/dataTables.dateTime.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/datarangepicker.min.js"></script>
    <script src="/js/contextMenu.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="/js/custom.js"></script>


</body>
</html>