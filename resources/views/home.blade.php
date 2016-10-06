@extends('layouts.app')

@section('content')
<<section class="section">
    <div class="container">
      <div class="heading">
        <h1 class="title">Pronto!</h1>
        <h2 class="subtitle">
          Você já está no {{ config('app.name') }}.
        </h2>
        <h2 class="subtitle">
          Mas, os serviços do {{ config('app.name') }} ainda não estão liberados para uso. Serão liberados
          apenas no dia da festa. <strong>Ate lá</strong>
        </h2>
        <h2 class="subtitle">
          <strong>Ate lá</strong>
        </h2>
      </div>
    </div>
  </section>
@endsection
