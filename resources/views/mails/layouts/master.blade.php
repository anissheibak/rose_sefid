<!doctype html>
<html lang="fa" dir="rtl">
<head>

    @include('mails.layouts.head-tag')
    @yield('head-tag')

</head>
<body>

    <!-- start header -->
    @include('mails.layouts.header')
    <!-- end header -->


    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
    <!-- end main one col -->


    <!-- start footer -->
    @include('mails.layouts.footer')
    <!-- end footer -->

</body>
</html>
