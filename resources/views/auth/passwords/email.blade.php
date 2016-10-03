@extends('layouts.app')

<!-- Main Content -->
@section('content')

<div class="column is-half is-offset-one-quarter">
    <div class="box is-primary">

        @if (session('status'))
            <notification :title="'Normal'" :direction="'Down'" message="{{ session('status') }}" :duration="0"></notification>
        @endif

        <h1 class="title is-3 has-text-centered">Resetar a senha</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <label for="email" class="label">E-mail</label>
            <p class="control">
              <input name="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" placeholder="Entre com seu email" required autofocus>
                @if ($errors->has('email'))
                    <span class="help is-danger">>{{ $errors->first('email') }}</span>
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
