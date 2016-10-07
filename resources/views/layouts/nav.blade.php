<nav class="nav">
  <div class="nav-left is-hidden-mobile">
    <a class="nav-item is-brand" href="{{ url('/') }}">
        <figure class="left-logo">
             <img src="images/simple-logo.png">
        </figure>
    </a>
  </div>

  <div class="nav-center" >
  <div class="tile">
       <figure class="image">
         <img src="images/logo.png">
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
@if ( !Auth::check() )
    <div class="hero nav-mobile">
        <div class="container">
            <div class="tile">
                <span class="nav-toggle">
                    <div class="columns is-mobile">
                        <div class="column"></div>
                          <div class="column ">
                              <a class="button is-medium is-primary is-outlined" href="{{ url('/login') }}">Logar</a>
                          </div>
                          <div class="column">
                              <a class="button is-medium is-primary is-outlined" href="{{ url('/register') }}">Cadastrar</a>
                          </div>
                        <div class="column"></div>
                    </div>
                </span>
            </div>
        </div>
    </div>
@endif
