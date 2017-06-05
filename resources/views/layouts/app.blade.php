<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset(config('settings.logo_path')) }}"/>
        <title>Neo Blog</title>
        @yield('meta')

        <!-- ~~~~~~~~~~~~~~ start CSS ~~~~~~~~~~~~~~~~~~-->
        @include('layouts.style')
        <!-- ~~~~~~~~~~~~~~ end CSS ~~~~~~~~~~~~~~~~~~-->
    </head>
    <body>

        <!-- MENU -->
        @include('layouts.menu')

        <!-- CONTENT -->
        <div class="container-fluid">
            @yield('content')
            <a href="javascript:void(0);" id="scroll">{{ trans('Top') }}<span></span></a>
        </div>

        <!-- FOOTER -->
        @include('layouts.footer')

        <!-- ~~~~~~~~~~~~~~ start JAVASCRIPT ~~~~~~~~~~~~~~~~~~-->
        @include('layouts.javascript')
        <!-- ~~~~~~~~~~~~~~ end JAVASCRIPT ~~~~~~~~~~~~~~~~~~-->
    </body>
</html>
