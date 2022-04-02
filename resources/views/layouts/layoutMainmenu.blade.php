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

    <link href="/css/helper.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">


</head>

<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo">
                    <a href="index.html">

                        <span> 2oolAmeme </span>
                    </a>
                </div>
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-bar-chart-alt"></i> Main Menu
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
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
                            <a href="{{ route('view') }}">Employees</a>
                        </li>
                        <li>
                            <a href="#.html">Report/History</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </div>


</body>
@yield('content')