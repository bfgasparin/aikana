@extends('layouts.app')

@section('content')
<user-register avatar="{{ old('social_avatar') }}" has-error="{{ !empty($errors->all()) }}"  inline-template>
    <div>
        <div class="column is-half is-offset-one-quarter">
        <template v-if="!showManual">
            <div class="box">
                <div class="tile">
                    <div class="container">
                        <a class="button is-large is-outlined is-info" href="{{ url ('/auth/facebook') }}" >
                            <span class="icon">
                              <i class="fa fa-facebook"></i>
                            </span>
                            <span>Cadastrar com o Facebook</span>
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
                            <span>Cadastrar com o Google</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="tile">
                    <div class="container">
                        <a class="button is-large is-outlined is-black" @click="activeManualRegister" >
                            <span class="icon">
                              <i class="fa fa-hand-peace-o"></i>
                            </span>
                            <span>Cadastro manual</span>
                        </a>
                    </div>
                </div>
            </div>
        </template>

        <template v-if="showManual">
            <div class="box">
                <div class="tile">
                    <div class="container">
                        <a class="button is-large is-outlined is-danger" @click="inactiveManualRegister" >
                            <span class="icon">
                              <i class="fa fa-step-backward"></i>
                            </span>
                            <span>Voltar</span>
                        </a>
                    </div>
                </div>
            </div>
            @include('auth.register-form', ['action' => url('/register') ])
        </template>
    </div>
    </div>
</user-register>
@endsection
