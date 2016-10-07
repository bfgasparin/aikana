@extends('layouts.app')

@section('content')
<guests-list inline-template>
  <div>
     <div class="section">
        <form  @submit.prevent="create">
            <label class="label">Email</label>
            <p class="control">
              <textarea class="text is-small" placeholder="Convidado" v-model="guestForm.email"></textarea>
            </p>
            <input class="button is-warning is-large" v-bind:class="{ 'is-disabled' : !guestForm.email }" type="submit" name="submit" value="Enviar">
        </form>
    </div>
    <div class="section">
        <table class="table">
          <thead>
            <tr>
              <th>Email</th>
              <th>Criação</th>
              <th>Já Convidado</th>
              <th>Aceitou</th>
              <th></th>
            </tr>
          </thead>
          <tbody v-for="guest in guests">
            <tr>
              <td>@{{ guest.email}}</td>
              <td>@{{ guest.created_at}}</td>
              <td>@{{ guest.was_invited}}</td>
              <td>@{{ guest.has_accepted}}</td>
              <td class="is-icon">
                <a @click="invite(guest)">
                  <i class="fa fa-email">Invite</i>
                </a>
              </td>
            </tr>
          </tbody>
         </table>
    <div>
  </div>
</guests-list>
@endsection