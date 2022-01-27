<!DOCTYPE html>
<html>

@include('includes.head')

<body>

    <!--header-->
    @include('includes.header')
    <!--end header-->

    @yield('main')

    <!--footer-->
    @include('includes.footer')
    <!--end footer-->
    @include('includes.scripts')
</body>

</html>