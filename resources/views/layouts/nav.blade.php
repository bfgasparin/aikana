<nav class="nav has-shadow ">
  <div class="nav-left">
    <a class="nav-item is-brand" href="{{ url('/') }}">
      <h1 class="title">{{ config('app.name', 'Aikana') }}</h1>
    </a>
  </div>

  <div class="nav-center" >
  <div class="tile">
    <span class="is-hidden-mobile">
       <figure class="image is-64x64">
         <img src="images/logo.png">
      </figure>
    </span>
    </div>
  </div>

  <div class="nav-right nav-menu">
    @if (Auth::guest())
    <span class="nav-item">
        <a class="button is-medium is-primary is-outlined" href="{{ url('/login') }}">Logar</a>
    </span>
    <span class="nav-item">
        <a class="button is-medium is-primary is-outlined" href="{{ url('/register') }}">Cadastrar</a>
    </span>
    @else

    <span class="nav-item">
        <a  class="button is-medium is-info is-outlined" href="{{ url('/logout') }}"
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
