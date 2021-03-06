<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div id="app">
        @include('layouts.nav')
        <div class="column is-half is-offset-one-quarter">
            <div class="flat notifications">
                <div class="container">
                    @if (session('status'))
                        <notification class="is-info" :title="'{{ session('title') }}'" :direction="'Right'" message="{{ session('status') }}" :duration="12000"></notification>
                    @endif
                </div>
            </div>
        </div>
        @if ( !auth()->guest() )
             @include('actions')
        @endif

        @yield('content')
        @include('layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
</body>
</html>
