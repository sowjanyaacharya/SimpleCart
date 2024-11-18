<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DashBoard')</title>
    <!--Boootstarp cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--js-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--font awesome-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #0dcaf0;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info" style="border: 2px solid pink;">
            <a class="navbar-brand" href="#">E-Cart</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Reports</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropDown">
                            <li><a class="dropdown-item" href="{{ url('/reports/brand-report') }}">Brand Reports</a></li>
                            <li><a class="dropdown-item" href="{{ url('/reports/category-report') }}">Category Reports</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="row">
            <div class="col-md-3 col-lg-2">
                <div class="sidebar">
                    <a class="{{ Request::is('brands') ? 'active' : ''}}" href="{{ url('/brands') }}">Brands</a>
                    <a class="{{ Request::is('categories') ? 'active' : ''}}" href="{{ url('/categories') }}">Category</a>
                    <a class="{{ Request::is('products') ? 'active' : ''}}" href="{{ url('/products') }}">Products</a>
                    <a href="#About">Cart</a>
                    <a href="#About">Payment</a>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                @yield('content')

            </div>
        </div>

    </div>
</body>

</html>
