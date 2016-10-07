@extends('layouts.app')

@section('content')
<dashboard inline-template>
<div>
    <div class="section">
        <div class="box">
            <div class="tile">
                <div class="container">
                    <a class="button is-large is-outlined is-info" href="{{ url ('/photod') }}" >
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
                    <a class="button is-large is-outlined is-danger" href="{{ url ('/messages') }}" >
                        <span class="icon">
                          <i class="fa fa-google"></i>
                        </span>
                        <span>Mensagens</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</dashboard>
@endsection