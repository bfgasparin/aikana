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
            <nav class="nav">
              <div class="nav-left">
                <a class="nav-item is-brand" href="{{ url('/') }}">
                  <h1 class="title">{{ config('app.name', 'Festa Gasparin') }}</h1>
                </a>
              </div>

              <div class="nav-center">
                <span class="nav-item">
                    ?      
                </span>
              </div>

              <div class="nav-right nav-menu">
                @if (Auth::guest())
                <span class="nav-item">
                    <a class="button is-primary is-outlined" href="{{ url('/login') }}">Logar</a>
                </span>
                <span class="nav-item">
                    <a class="button is-primary is-outlined" href="{{ url('/register') }}">Cadastrar</a>
                </span>
                @else

                <span class="nav-item">
                    <a  class="button is-info is-outlined" href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </span>
                @endif
              </div>
            </nav>

            @yield('content')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
