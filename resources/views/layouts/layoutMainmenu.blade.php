<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Styles -->

    <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body class="main-bg">
    <div class="main-wrapper">
        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{ asset('images/logo.png') }}" width="50px" alt="">
                            <span> 2oolAmeme </span>
                        </a>
                    </div>

                    <ul>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <i class="ti-bar-chart-alt"></i> Main Menu
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#.html">Dashborad</a>
                        </li>
                        <li>
                            <a href="#.html">My Profile</a>
                        </li>
                        <li>
                            <a href="#.html">Inventory</a>
                        </li>
                        <li>
                            <a href="{{ route('users') }}">Users</a>
                        </li>
                        <li>
                            <a href="#.html">Report/History</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-body">
            @yield('content')
        </div>
    </div>


</body>

</html>