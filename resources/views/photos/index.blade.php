@extends('layouts.app')

@section('content')
<photos-list :user="{{ auth()->user() }}" inline-template>
    <div>

        <template v-if="photos.length > 0">
            <div class="section">

            <div v-for="photo in photos">
                <div class="card">
                      <div class="card-image">
                        <figure class="image is-4by3">
                          <img :src="photo.path_url" alt="">
                        </figure>
                      </div>
                      <div class="card-content">
                        <div class="media">
                          <div class="media-left">
                            <figure class="image is-32x32">
                              <img :src="photo.user.avatar_url" alt="Image">
                            </figure>
                          </div>
                          <div class="media-content">
                            <p class="title is-5">@{{ photo.user.name }}</p>
                            <p class="subtitle is-6">@{{ photo.created_at}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
            </div>
        </template>
        <div class="section">
                <p class="control">
                  <file-upload name="newPhoto" :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}' }" action="upload/avatar"></file-upload>
                </p>
            </form>
        </div>
    </div>
</photos-list>
@endsection