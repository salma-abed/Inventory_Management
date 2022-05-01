<!doctype html>
<html>

<head>
    @include('layouts.links')
</head>

<body>
    <div class="container-fluid no-padding">
        <header class="row">
            @include('layouts.navbar')
        </header>
        @include('layouts.mainmenu')
        <div id="main" class="row">
            @yield('content')
        </div>
        <footer class="row text-center text-white" style="position: relative">
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>