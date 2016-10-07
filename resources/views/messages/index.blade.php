@extends('layouts.app')

@section('content')
<messages-list :user="{{ auth()->user() }}" inline-template>
    <div>

        <template v-if="messages.length > 0">
            <div class="section">

            <div v-for="message in messages">
                <message :from-current-user="isUserMessage(message)" :message="message" :direction="'Up'" :duration="100000"></message>
            </div>
            </div>
        </template>
        <div class="section">
            <form  @submit.prevent="create">
                <p class="control">
                  <textarea class="textarea is-medium" placeholder="Insira sua mensagem aqui" v-model="messageForm.content"></textarea>
                </p>
                <input class="button is-warning is-large is-fullwidth" v-bind:class="{ 'is-disabled' : !messageForm.content }" type="submit" name="submit" value="Enviar">
            </form>
        </div>
    </div>
</messages-list>
@endsection