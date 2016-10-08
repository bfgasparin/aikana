@extends('layouts.app')

@section('content')
<painel inline-template>
    <div>
        <upload-painel v-if="mainPhoto" :photo="mainPhoto" :direction="'Up'" :duration="1000000"></upload-painel>
        <div class="flat notifications panel-notification">
            <div class="container">
                <messages-notification :duration="100000"></messages-notification>
            </div>
        </div>
    </div>
</painel>
@endsection
