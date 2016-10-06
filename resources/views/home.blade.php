@extends('layouts.app')

@section('content')
<section class="section">
        <h1 class="title">Pronto!</h1>
        <h2 class="subtitle">
          Você já está no {{ config('app.name') }}.
        </h2>
        <h2 class="subtitle">
          Mas, os serviços do {{ config('app.name') }} só estarão disponíveis para uso no dia da festa. 
          Até lá. Continue acessando <strong>{{ config('app.name') }} </strong> para saber mais
          novidades sobre seus serviços.

          Atualizaremos esa página em breve.

        </h2>
        <h2 class="subtitle">
          <strong>Ate lá</strong>
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
