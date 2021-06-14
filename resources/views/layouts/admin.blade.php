<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="author" content="" />


    <title>Home | Eleven Admin Template</title>
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">


    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="/assets/admin/vendor/Chart.min.js"></script>
</head>
<body>
<svg width="24" height="24" viewBox="0 0 24 24" style="display:none">
    <g
        id="logo-icon"
        stroke="currentColor"
        stroke-width="1"
        stroke-linecap="round"
        stroke-linejoin="round"
        fill="none"
        fill-rule="evenodd"
    >
        <path
            d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"
        ></path>
    </g>
</svg>

<div class="page page-sticky-sidebar">

    <div class="position-relative d-flex flex-row flex-fill page-wrapper">
        <div
            class="sidebar bg-dark page-sidebar"
            style="transform:translateX(0);min-width:280px;max-width:280px">
            <div class="h-100 d-flex flex-column flex-1">
                <nav class="navbar navbar-expand-md  d-none d-lg-flex d-xl-flex bg-dark">
                    <a href="{{route('home')}}" class="navbar-brand">
                        <svg width="24" height="24">
                            <use xlink:href="#logo-icon"></use>
                        </svg>
                        <span class="ml-3">Eleven</span>
                    </a>
                    <a href="javascript:;" class="nav-toggle">
                <span class="animated-icon">
                  <div
                      style="width:24px;height:24px"
                      data-animation-path="/assets/admin/vendor/animated-icons/menu-back/menu-back.json"
                      data-anim-loop="false">
                  </div>
                </span>
                    </a>
                </nav>
                <ul class="d-block scroll-y flex-1 py-3 nav flex-column">
                    <div class="sidebar-item">
                        <li class="nav-item  active">
                            <a class="nav-link d-flex align-items-center nav-link" href="{{route('admin.index')}}">
                    <span class="animated-icon">
                    </span>
                                <span class="mr-auto menu-name">Список всех продуктов</span>
                            </a>
                        </li>

                        <li class="nav-item  active">
                            <a class="nav-link d-flex align-items-center nav-link" href="{{route('admin.product.create')}}">
                    <span class="animated-icon">
                    </span>
                                <span class="mr-auto menu-name">Создать продукт</span>
                            </a>
                        </li>

                        <li class="nav-item  active">
                            <a class="nav-link d-flex align-items-center nav-link" href="{{route('admin.comment')}}">
                    <span class="animated-icon">
                    </span>
                                <span class="mr-auto menu-name">Коментарии</span>
                            </a>
                        </li>

                    </div>
                </ul>
            </div>
        </div>
        <div class="container" style="padding-top: 50px">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="/assets/admin/vendor/jquery-3.4.1.slim.min.js"></script>
<script src="/assets/admin/vendor/bootstrap.bundle.min.js"></script>
<script src="/assets/admin/vendor/lottie.js"></script>

<script src="/assets/admin/js/app.js"></script>

<script src="/assets/admin/js/dashboard.js"></script>
</body>
</html>
