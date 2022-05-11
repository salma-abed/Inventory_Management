<body class="main-bg">
    <div class="main-wrapper">
        <div class="sidenav" id="mySideBar">
            <div class="l d-flex justify-content-center">
                <a href="index.html">
                    <img src="{{ asset('images/logo.png') }}" width="70px" alt="">
                </a>
            </div>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            @foreach ($navbarwm as $navbarItem)
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="{{ route($navbarItem->route) }}">{{ $navbarItem->name }}</a>
            </li>
            @endforeach
        </div>
    </div>

</body>