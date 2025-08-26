<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="نظام ادارة العيادات">
    <meta name="Author" content="نظام ادارة العيادات">
    <meta name="Keywords" content="العيادات"/>
    
    @include('layouts.head')

    <!-- 🔹 مهم لملفات Livewire CSS -->
    @livewireStyles
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.main-header')
        @include('layouts.main-sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.footer')
        </div>
    </div>

    @include('layouts.javascript')
    @include('layouts.json_function')

    <!-- 🔹 مهم لملفات Livewire JS -->
    @livewireScripts

    <!-- 🔹 في حالة فيه سكريبتات إضافية -->
    @stack('scripts')
</body>

</html>
