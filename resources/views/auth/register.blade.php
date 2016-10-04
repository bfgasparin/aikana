@extends('layouts.app')

@section('content')
<div class="column is-half is-offset-one-quarter">
    <div class="box is-primary">
        <h1 class="title is-3 has-text-centered">Completar meu cadastro </h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            <div class="tile">
                <div class="container">
                    <figure class="image is-128x128">
                        <img src="{{ old('social_avatar') }}">
                    </figure>
                </div>
            </div>

            {{ csrf_field() }}
            <input type="hidden" name="social_avatar" value="{{ old('social_avatar') }}">
            <input type="hidden" name="facebook_id" value="{{ old('facebook_id') }}">
            <input type="hidden" name="google_id" value="{{ old('google_id') }}">

            <div class="box">
                <div class="container">
                    <section class="hero">
                      <div class="hero-body is-paddingless">
                        <div class="container">
                          <h1 class="title">
                            Meu <strong>Gasparin ID</strong>
                          </h1>
                        </div>
                      </div>
                    </section>
                    <label for="username" class="label"></label>
                    <p class="control">
                      <input name="username" class="input {{ $errors->has('username') ? ' is-danger' : '' }}" type="text" placeholder="meu-nickname" required autofocus value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="help is-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="container">
                     <section class="hero">
                      <div class="hero-body is-paddingless">
                        <div class="container">
                          <h1 class="title">Meus Dados Pessoais</h1>
                        </div>
                      </div>
                    </section>
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
                </div>
            </div>

            <div class="box">
                <div class="container">
                     <section class="hero">
                      <div class="hero-body is-paddingless">
                        <div class="container">
                          <h1 class="title">Segurança</h1>
                        </div>
                      </div>
                    </section>
                    <div class="control is-horizontal">
                        <label for="password" class="label">*Senha</label>
                         <div class="help is-info media-right">(Opcional)</div>
                    </div>
                    <p class="control">
                        <input id="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Sua senha" autofocus>
                    @if ($errors->has('password'))
                        <span class="help is-danger">{{ $errors->first('password') }}</span>
                    @endif
                    </p>

                    <div class="control is-horizontal">
                        <label for="password-confirm" class="label is-block">Confirmar Senha</label>
                        <div class="help is-info media-right">(Opcional)</div>
                    </div>
                    <p class="control">
                        <input id="password-confirm" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" placeholder="Confirme sua senha">
                        @if ($errors->has('password_confirmation'))
                            <span class="help is-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="tile">
                <div class="container">
                    <button class="button is-large is-outlined is-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
