<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MemoriesOf, app') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script  type="text/javascript"   src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
        <script  type="text/javascript"   src="..\..\public\js\ChangeDescription.js($this)"></script>


        {{--<script  type="text/javascript"   src="E:\wamp64\www\dans2\public\js\ChangeDescription.js(selObject)"></script>--}}


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
{{--            @livewire('navigation-dropdown')--}}
{{----}}
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
{{--                    {{ $header }}--}}
                </div>
            </header>

            <!-- Page Content -->
            <main>

                @yield('content')
                @show
{{--                {{ $slot }}--}}
            </main>
        </div>

{{--        @stack('modals')--}}

        @livewireScripts
    </body>
</html>
