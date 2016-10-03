@extends('layouts.app')

@section('content')

<div class="column is-half is-offset-one-quarter">
    <div class="box is-primary">
        <h1 class="title is-3 has-text-centered">Resetar a senha</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email" class="label">E-mail</label>
            <p class="control">
              <input name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" placeholder="Entre com seu email" required autofocus>
                @if ($errors->has('email'))
                    <span class="help is-danger">{{ $errors->first('email') }}</span>
                @endif
            </p>

            <label for="password" class="label">Nova Senha</label>
            <p class="control">
              <input id="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Sua nova senha" required autofocus>
                @if ($errors->has('password'))
                    <span class="help is-danger">{{ $errors->first('password') }}</span>
                @endif
            </p>

           <label for="password-confirm" class="label">Confirmar Senha</label>
            <p class="control">
              <input id="password-confirm" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" placeholder="Confirme sua nova senha" required autofocus>
                @if ($errors->has('password_confirmation'))
                    <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </p>

            <div class="tile">
                <div class="container">
                    <button class="button is-outlined is-primary">Resetar Senha</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
