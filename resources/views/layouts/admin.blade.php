<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Loja Virtual</title>
    <link rel="stylesheet" href="/layouts/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/layouts/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/layouts/admin/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="/src/plugins/chosen/chosen.min.css">

    <link href="/css/admin.css?v={!! CACHE_FILE !!}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{!! route('logout') !!}"><i class="fas fa-user-times"></i></a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary  elevation-4">
        <a href="" class="brand-link">
            <img src="/layouts/admin/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Loja Virtual</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/layouts/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="javascript: void(0);" class="d-block">Éderson Sandre</a>
                </div>
            </div>

            <nav class="mt-2">
                @include('layouts.includes.menu')
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer">
        Copyright &copy; 2019~{!! date('Y') !!} - All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Loja Virtual</b> {!! VERSION !!}
        </div>
    </footer>
</div>

<script src="/layouts/admin/plugins/jquery/jquery.min.js"></script>
<script src="/layouts/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/layouts/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/layouts/admin/dist/js/adminlte.js"></script>
<script src="/layouts/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>

<script src="/src/plugins/chosen/chosen.jquery.min.js"></script>
<script src="/src/plugins/mask/dist/jquery.mask.min.js"></script>
<script type="text/javascript" src="/src/plugins/jquery/jquery.form.js"></script>
<script src="/js/function.js?v={!! CACHE_FILE !!}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="/js/admin.js?v={!! CACHE_FILE !!}"></script>
<script>
    var _user = new Object();
    var token = "<?php echo csrf_token(); ?>";

    _user.name = "<?php //echo \App\Http\Helpers\UserHelpers::getName(); ?>";

    window.onload = function () {
        @yield('javascript')
    };
</script>

</body>
</html>
