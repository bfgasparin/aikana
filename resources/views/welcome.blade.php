@extends('layouts.app')

@section('content')
<section class="section is-medium">
    <div class="container">
        <div class="notification is-primary is-bold">
          <h1 class="title">
            {{ config('app.name') }}
          </h1>
          <h2 class="subtitle">
            A diversão para as festas da família!
          </h2>
        </div>
  </div>
</section>

  <div class="bg-couch">

  </div>

<section class="hero is-medium is-light is-bold">
  <div class="hero-body">
    <div class="container">
      <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64">
                <img src="/images/bruno.jpeg" alt="Image">
              </figure>
              <figure class="image is-64x64">
                <img src="/images/marta.jpeg" alt="Image">
              </figure>
              <figure class="image is-64x64">
                <img src="/images/victor.jpeg" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>Bora comemorar!!</strong> <span class="icon is-small"><i class="fa fa-music"></i></span>
                  <br>
                  O Aniversário do <strong>Victor</strong>, do <strong>Bruno</strong> e da <strong>Marta</strong> chegou. Vamos comemorar. Estamos preparando uma 
                  grande festa, e esperamos que você possa aproveitar e curtir ao máximo. 

                  Temos várias novidades pra você, e o <strong>{{ config('app.name') }}</strong> é uma delas. 

                  Vamos, faça o cadastro e descubra mais!
                  <span class="icon is-small"><i class="fa fa-heart"></i></span>

                  <span class="nav-item">
                      <a class="button is-medium is-primary is-outlined" href="{{ url('/register') }}">Cadastrar</a>
                  </span>

                </p>
              </div>
            </div>
          </article>
        </div>
    </div>
  </div>

</section>
  <div class="bg-barbecue">

  </div>
<section class="section is-medium">
    <div class="container">
        <div class="notification is-primary is-bold">
          <h1 class="title">
            Mas o que é {{ config('app.name') }} ?
          </h1>
          <h2 class="subtitle">
            {{ config('app.name') }} é uma plataforma de entreterimento para festas criada por Bruno Ferme Gasparin para a família Gasparin e todos os associados :). Nela você vai poder acompanhar os eventos do nosso aniversário
            e interagir com os demais convidados! Esperamos que toda a família aproveite. 
          </h2>
        </div>
  </div>
</section>
<section class="hero is-medium is-light is-bold">
  <div class="hero-body">
    <div class="container">
      <div class="columns">
        <div class="column">
            <div class="box">
                <h1 class="title">
                   Momentos
                </h1>
                <h2 class="subtitle">
                  Crie, compartilhe, assista, relembre!
                </h2>
            </div>
        </div>  
        <div class="column">
            <div class="box">
                <h1 class="title">
                   Eventos
                </h1>
                <h2 class="subtitle">
                  Interaja, assista, participe!
                </h2>
            </div>
        </div> 
        <div class="column">
            <div class="box">
                <h1 class="title">
                  Diversão
                </h1>
                <h2 class="subtitle">
                  Só queremos que você aproveite a festa
                </h2>
            </div>
        </div> 
      </div>

    </div>
  </div>

</section>
<div class="bg-tv">
</div>
<section class="section is-medium">
    <div class="container">
        <div class="notification has-shadow is-light is-bold">
          <h2 class="subtitle">
            Nossas festas sempre são diferentes, alegres, e cheia de novidades. 
            Esperamos que gostem do {{ config('app.name') }}. 
          </h2>
        </div>
  </div>
</section>

@endsection