@extends('layouts.app')

@section('content')
<painel-star inline-template>
    <div>
        <template v-if="painelPhoto">
            <div class="section">

              <div class="container">
                <div class="columns">
                    <div class="column"></div>
                    <div class="column">
                        <div class="photos-list">
                            <div class="tile">
                              <upload v-if="painelPhoto" :photo="painelPhoto.photo" :direction="'Left'" :duration="0"></upload>
                            </div>
                        </div>
                    </div>
                    <div class="column"></div>
                </div>
              </div>
            </div>
        </template>
        <button @click="star" class="button is-warning is-large is-fullwidth" type="submit" name="submit"> Votar na foto</button>
    </div>
</painel-star>
@endsection