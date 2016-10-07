@extends('layouts.app')

@section('content')
<section class="section">
        <h1 class="title">Olá! {{ auth()->user()->name }}</h1>
        <h2 class="subtitle">
          Este é o {{ config('app.name') }}.
        </h2>
        <h2 class="subtitle">
          Os serviços disponíveis no {{ config('app.name') }} só estarão disponíveis para uso no dia da festa.
          Até lá. continue acessando <strong>{{ config('app.name') }} </strong> para saber mais novidades sobre seus serviços.


        </h2>
        <h2 class="subtitle">
          Atualizaremos essa página em breve.
        </h2>
</section>
<section class="section">
        <h1 class="title">Local da Festa</h1>
        <div class="subtitle bg-table"></div>
        <h2 class="subtitle">
          Rua Doutor Argemiro Couto de Barros, 177 - Pirituba - São Paulo  - SP.
        </h2>
        <h2 class="subtitle">
          <strong>Ate lá</strong>
        </h2>
  </section>
@endsection
