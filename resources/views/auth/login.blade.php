@extends('layouts.app')

@section('content')
<div class="column is-half is-offset-one-quarter">
    <div class="box">
        <div class="tile">
            <div class="container">
                <a class="button is-large is-outlined is-info" href="{{ url ('/auth/facebook') }}" >
                    <span class="icon">
                      <i class="fa fa-facebook"></i>
                    </span>
                    <span>Logar com o Facebook</span>
                </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="tile">
            <div class="container">
                <a class="button is-large is-outlined is-danger" href="{{ url ('/auth/google') }}" >
                    <span class="icon">
                      <i class="fa fa-google"></i>
                    </span>
                    <span>Logar com o Google</span>
                </a>
            </div>
        </div>
    </div>

    <div class="box is-primary">
        <h1 class="title is-3 has-text-centered">Logar no <strong>Gasparin Festas</strong></h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <label for="email" class="label">E-mail</label>
            <p class="control">
              <input name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" placeholder="Entre com seu email" required autofocus>
                @if ($errors->has('email'))
                    <span class="help is-danger">{{ $errors->first('email') }}</span>
                @endif
            </p>

            <label for="password" class="label">Senha</label>
            <p class="control">
              <input id="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Sua senha" required autofocus>
                @if ($errors->has('password'))
                    <span class="help is-danger">{{ $errors->first('password') }}</span>
                @endif
            </p>


            <p class="control">
              <label class="checkbox">
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </p>

            <a  href="{{ url('/password/reset') }}">Ih! Não lembro a senha!</a>
            <div class="tile">
                <div class="container">
                    <button class="button is-large is-outlined is-primary">Logar </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
