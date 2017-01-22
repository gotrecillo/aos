<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'AgeBuild')</title>

    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'Warhammer Age of Sigmar Army Builder')">
    <meta name="author" content="@yield('meta_author', 'Gotrecillo')">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/materialize/css/materialize.min.css">
    @yield('meta')

</head>
<body>
@yield('content')
<script src="/js/app.js"></script>
<script src="/vendor/materialize/js/materialize.min.js"></script>
@yield('scripts')
</body>
</html>