<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('layouts.partials.head')

    <title>Tân Việt</title>
</head>

<body>
    @include('layouts.partials.header')

    <main>
        @yield('content')

        @include('layouts.partials.mailForm')
    </main>
    @include('layouts.partials.drawer')

    @include('layouts.partials.footer')

</body>

@include('layouts.partials.js')

</html>
