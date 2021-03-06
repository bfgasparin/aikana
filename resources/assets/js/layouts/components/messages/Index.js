import Message from './../../../components/Message.vue';

export default {

    props: ['user'],
    components: {Message},

    data: function() {
        return {
            messages: [],
            messageForm: {
              content : ''
            },
        }
    },

    mounted: function () {
        Echo.channel('messages')
          .listen('MessageCreated', (e) => {
              e.message.user = e.user;
              this.messages.push(e.message);
          });
    },

    methods: {
        create(e) {
            this.$http.post('api/messages', this.messageForm)
                .then((response) => {
                    this.messageForm.content = '';
                    this.messages.push(response.data);
            }, (response) => {
                // error callback
            });
        },

        isUserMessage(message) {
            return message.user_id == this.user.id;
        }
    }
}