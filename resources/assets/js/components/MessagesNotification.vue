<template>
    <div v-if="messages.length > 0">
        <div v-for="message in messages">
            <message :from-current-user="false" :message="message" :direction="'Up'" :duration="duration"></message>
        </div>
    </div>
</template>

<script>
    import Message from './Message.vue';

    export default {

        props: {
            duration: {
              type: Number,
              default: 4500
            },
        },

        components: {Message},

        data: function() {
            return {
                messages: [],
            }
        },

        mounted: function () {
            Echo.channel('messages')
              .listen('MessageCreated', (e) => {
                  e.message.user = e.user;
                  this.messages.push(e.message);
                 
                  if(this.messages.length > 7){
                        this.messages.shift();
                  }
              });

        },

        methods: {
        }
    }
</script>



