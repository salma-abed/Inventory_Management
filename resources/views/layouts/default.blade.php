<!doctype html>
<html>

<head>
    @include('layouts.links')
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            @include('layouts.navbar')
        </header>
        <div id="main" class="row">
            @yield('content')
        </div>
        <footer class="row">
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>