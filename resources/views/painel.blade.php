@extends('layouts.app')

@section('content')
<painel :duration="90000" inline-template>
    <div>
        <upload-painel v-if="painelPhoto" :photo="painelPhoto.photo" :stars="painelPhoto.stars" :direction="'Up'" :duration="90010"></upload-painel>

        <div class="flat notifications panel-notification">
            <div class="container">
                <messages-notification :duration="300000"></messages-notification>
            </div>
        </div>
    </div>
</painel>
@endsection
