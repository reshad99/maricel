<!DOCTYPE html>
<html lang="tr" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>MARICEL</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- CSS Alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<body>

<!--PRELOADE========================-->
<div class="preloader">
    <div class="loader">
        <div class="holder">
            <div class="box"></div>
        </div>
        <div class="holder">
            <div class="box"></div>
        </div>
        <div class="holder">
            <div class="box"></div>
        </div>
    </div>
</div>
<!--PRELOADE========================-->
<!--HEADER SECTION========================-->
<header class="header tw-head">
    <div class="header-down ">
        <div class="container-fluid">
            <nav class="header_nav">
                <div class="header-left">
                    <ul class="header-menu">
                        <li><a href="/about">Haqqımızda</a></li>
                        <li><a href="/campaign">Kampaniya</a></li>
                    </ul>
                </div>
                <a href="/" class="header_logo">
                    <img src="img/logo/logo.png" alt="">
                </a>
                <div class="header-right">
                    <ul class="header-menu">
                        <li><a href="/register">Qeydiyyat</a></li>
                        <li><a href="/contact">Əlaqə</a></li>
                    </ul>
                </div>
                <div class="mobileMenu">
                    <button class="navbar-toggler">
                        <span></span>
                    </button>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="vs-menu-wrapper position-re">
    <div class="vs-menu-area">
        <button class="vs-menu-toggle text-theme vs-active"><i class="fas fa-times-circle"></i></button>

        <div class="linec top left"></div>
        <ul class="menu-items">
            <li class="nav-item"><a class="nav-link vs-mobile-menu active" href="/">Ana Səhifə</a></li>
            <li class="nav-item"><a class="nav-link vs-mobile-menu" href="/about">Haqqımızda</a></li>
            <li class="nav-item"><a class="nav-link vs-mobile-menu" href="/campaign">Kompaniya</a></li>
            <li class="nav-item"><a class="nav-link vs-mobile-menu" href="/register">Qeydiyyat</a></li>
            <li class="nav-item"><a class="nav-link vs-mobile-menu" href="/contact">Əlaqə</a></li>
        </ul>
    </div>
</div>
