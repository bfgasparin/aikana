@extends('layouts.app')

@section('content')
<photos-list :user="{{ auth()->user() }}" inline-template>
    <div>

        <template v-if="photos.length > 0">
            <div class="section">

              <div class="container">
                <div class="columns">
                    <div class="column"></div>
                    <div class="column">
                        <div class="photos-list" v-for="photo in photos">
                            <div class="tile">
                              <upload :photo="photo" :direction="'Up'" :duration="100000"></upload>
                            </div>
                        </div>
                    </div>
                    <div class="column"></div>
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