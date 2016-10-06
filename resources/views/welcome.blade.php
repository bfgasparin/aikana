@extends('layouts.app')

@section('content')
<section class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
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
        <img src="images/bruno.jpeg" alt="Image">
      </figure>
      <figure class="image is-64x64">
        <img src="images/marta.jpeg" alt="Image">
      </figure>
      <figure class="image is-64x64">
        <img src="images/victor.jpeg" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <p>
          <strong>Bora comemorar!!</strong> <span class="icon is-small"><i class="fa fa-music"></i></span>
          <br>
          O Aniversário do <strong>Victor</strong>, do <strong>Bruno</strong> e da <strong>Marta</strong> chegou. Vamos comemorar. Estamos preparando uma 
          grande festa, e esperamos que você possa aproveitar e curtir ao máximo. 

          Temos várias novidades pra você, e <strong>{{ config('app.name') }}</strong> é uma delas. 
        </p>
      </div>
      <nav class="level">
        <div class="level-left">
          <a class="level-item">
            <span class="icon is-small"><i class="fa fa-reply"></i></span>
          </a>
          <a class="level-item">
            <span class="icon is-small"><i class="fa fa-retweet"></i></span>
          </a>
          <a class="level-item">
            <span class="icon is-small"><i class="fa fa-heart"></i></span>
          </a>
        </div>
      </nav>
    </div>
  </article>
</div>

    </div>
  </div>

</section>
  <div class="bg-barbecue">

  </div>

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
                  Alegria
                </h1>
                <h2 class="subtitle">
                  Queremos deixar você feliz.
                </h2>
            </div>
        </div> 
      </div>

    </div>
  </div>

</section>
  <div class="bg-tv">

  </div>
@endsection