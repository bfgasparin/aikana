@extends('layouts.app')

@section('content')
<dasboard>
<div class="section">
    <div class="box">
        <div class="tile">
            <div class="container">
                <a class="button is-large is-outlined is-info" href="{{ url ('/auth/facebook') }}" >
                    <span class="icon">
                      <i class="fa fa-facebook"></i>
                    </span>
                    <span>Fotos</span>
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
                    <span>Mensagens</span>
                </a>
            </div>
        </div>
    </div>
</div>
</dasboard>
@endsection