<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/jpg" href="/assets/img/logo.jpg" />

    <!--Favicon Icon-->
    <!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/assets/admin/css/quicksand.css">
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="/assets/admin/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/admin/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Animate CSS-->
    <link rel="stylesheet" href="/assets/admin/css/animate.min.css">
    <!--Nice select -->
    <link rel="stylesheet" href="/assets/admin/css/nice-select.css">

    <title>@yield('title')</title>
</head>

@php
$admin = auth()->user();
@endphp

<body>

    <div id="app">

        <!--Page loader-->
        <div class="loader-wrapper">
            <div class="loader-circle">
                <div class="loader-wave"></div>
            </div>
        </div>
        <!--Page loader-->

        <!--Page Wrapper-->

        <div class="container-fluid">

            @include('admin.includes.header')

            <div class="row main-content">
                @include('admin.includes.sidebar')
                @yield('main')

            </div>
            <!--Content right-->

        </div>
        <!--Page Wrapper-->

    </div>

    @include('admin.includes.scripts')

</body>