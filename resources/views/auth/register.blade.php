@extends('layouts.app')

@section('content')
<div class="column is-half is-offset-one-quarter">
    <div class="box is-primary">
        <h1 class="title is-3 has-text-centered">Cadastrar</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <label for="name" class="label">Nome</label>
            <p class="control">
              <input name="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" type="text" placeholder="Entre com seu Nome" required autofocus value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help is-danger">{{ $errors->first('name') }}</span>
                @endif
            </p>

            <label for="email" class="label">E-mail</label>
            <p class="control">
              <input name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" placeholder="Entre com seu E-mail" required autofocus value="{{ old('email') }}">
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

           <label for="password-confirm" class="label">Confirmar Senha</label>
            <p class="control">
              <input id="password-confirm" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" placeholder="Confirme sua senha" required autofocus>
                @if ($errors->has('password_confirmation'))
                    <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </p>

            <div class="tile">
                <div class="container">
                    <button class="button is-outlined is-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
