<nav class="nav">
  <div class="nav-left is-hidden-mobile">
    <a class="nav-item is-brand" href="{{ url('/') }}">
        <figure class="left-logo">
             <img src="/images/simple-logo.png">
        </figure>
    </a>
  </div>

  <div class="nav-center" >
    <div class="tile">
         <figure class="central-image">
           <img src="/images/logo.png">
        </figure>
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
        <a  class="button is-medium is-primary is-outlined" href="{{ url('/home') }}"
            x>
            Festa
        </a>
        <a  class="button is-medium is-primary is-outlined"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
        <div class="nav-item is-left">
          <figure class="image is-64x64">
              <img src="{{ auth()->user()->avatar_url }}">
          </figure>
        </div>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </span>
    @endif
  </div>

</nav>
    <div class="hero nav-mobile">
        <div class="container">
            <div class="tile">
                <span class="nav-toggle">
                    <div class="columns is-mobile">
                    @if ( !Auth::check() )
                        <div class="column"></div>
                          <div class="column ">
                              <a class="button is-medium is-primary is-outlined" href="{{ url('/login') }}">Logar</a>
                          </div>
                          <div class="column">
                              <a class="button is-medium is-primary is-outlined" href="{{ url('/register') }}">Cadastrar</a>
                          </div>
                        <div class="column"></div>
                    @else
                        <div class="column"></div>
                       <div class="column">
                              <a class="button is-medium is-primary is-outlined" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                        <div class="column"></div>
                        <div class="column"></div>
                       <div class="column">
                              <a class="button is-medium is-primary is-outlined" href="{{ url('/home') }}">Festa</a>
                        </div>
                        <div class="column">
                          <figure class="image is-64x64">
                              <img src="{{ auth()->user()->avatar_url }}">
                          </figure>
                        </div>
                        <div class="column"></div>
                    @endif
                    </div>
                </span>
            </div>
        </div>
    </div>

