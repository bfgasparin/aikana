export default {

    props: ['user'],

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
            return true;//message.user.id === this.user.id;
        }
    }
}
