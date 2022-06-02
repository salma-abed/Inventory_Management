<body class="main-bg">
    <div class="main-wrapper">
        <div class="sidenav" id="mySideBar">
            <div class="l d-flex justify-content-center">
                <a href="index.html">
                    <img src="{{ asset('images/logo.png') }}" width="70px" alt="">
                </a>
            </div>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            @if(Auth::user()->user_type == 'admin')
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="profilePage">My Profile</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="productsAdmin">Products</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="placesAdmin">Places</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="users">Users</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="history">History</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="signout">Logout</a>
            </li>
            @elseif(Auth::user()->user_type == 'warehouse')
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="profilePage">My Profile</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="placesWm">Warehouses</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="signout">Logout</a>
            </li>
            @elseif(Auth::user()->user_type == 'operations')
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="profilePage">My Profile</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="productsOA">Products</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="placesOA">Places</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="signout">Logout</a>
            </li>
            @elseif(Auth::user()->user_type == 'sales')
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="dashboard">Dashboard</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="profilePage">My Profile</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="stores">Stores</a>
            </li>
            <li class="nav-item list-unstyled">
                <a class="nav-link" href="signout">Logout</a>
            </li>
            @endif
        </div>
    </div>

</body>