@extends('layouts.app')

@section('content')
<user-register avatar="{{ old('social_avatar') }}" inline-template>
    <div>
        <div class="column is-half is-offset-one-quarter">
        <h1 class="title is-3 has-text-centered">Completar meu cadastro </h1>
        @include('auth.register-form', ['action' => url('/register') ])
    </div>
    </div>
</user-register>
@endsection
