<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Rayyan') }}</title>

    {{-- Styles --}}
    @include('front.layouts.styles')

    {{-- Extra head content from child views --}}
    @yield('head')
</head>

<body class="d-flex flex-column min-vh-100 bg-light text-dark">

    {{-- Navigation bar --}}
    @include('front.layouts.navbar')

    {{-- Main content --}}
    <main class="flex-grow-1 ">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    @include('front.layouts.footer')

    {{-- Scripts --}}
    @include('front.layouts.scripts')
    @yield('scripts')

</body>
</html>
