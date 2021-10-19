<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Scorng</title>

    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <style>
        .nav li a {
            color: #c2c7d0 !important;
        }

        .logo-name {
            color: #c2c7d0 !important;
        }

        .bg-dark {
            background: #343A3F !important;
        }
    </style>

</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100" >
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline logo-name">Admin Panel Scorng</span>
                </a>
                <hr style="border: 1px solid #fff !important; width: 100%">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">


                    <li>
                        <a href="/admin/dashboard" class="nav-link px-0 align-middle">
                            <i class="fas fa-users"></i> <span class="ms-1 d-none d-sm-inline">All Users</span></a>
                    </li>
                    <li>
                        <a href="/admin/applicants" class="nav-link px-0 align-middle">
                            <i class="fas fa-user-tie"></i> <span class="ms-1 d-none d-sm-inline">Applicants</span></a>
                    </li>
                    <li>
                        <a href="/admin/faqs" class="nav-link px-0 align-middle">
                            <i class="fas fa-question-circle"></i> <span class="ms-1 d-none d-sm-inline">FAQs</span></a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">--}}
{{--                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Bootstrap</span></a>--}}
{{--                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">--}}
{{--                            <li class="w-100">--}}
{{--                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Admin</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
{{--                        <li><a class="dropdown-item" href="#">New User...</a></li>--}}
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/signout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col py-3">



