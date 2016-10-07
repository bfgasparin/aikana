@extends('layouts.app')

@section('content')
<messages-list :user="{{ auth()->user() }}" inline-template>
    <div>
        
        <template v-if="messages.length > 0">
            <div class="section">

            <div v-for="message in messages">
            <article v-bind:class="[ isUserMessage(message) ? 'is-light' : 'is-info' , ' media notification']">
                  <figure class="media-left">
                    <p class="image is-64x64">
                      <img :src="message.user.avatar_url">
                    </p>
                  </figure>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>@{{ message.username }}</strong> <small>message.crated_at</small> 
                        <br>
                        @{{ message.content }}
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
                  <div class="media-right">
                    <button class="delete"></button>
                  </div>
                </article>
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