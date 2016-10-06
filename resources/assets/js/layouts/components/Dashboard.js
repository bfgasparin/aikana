export default {

    data: function() {
        return {
            messages: [],
            messageForm: {
              content : ''
            }
        }
    },

    methods: {
        create(e) {
            this.$http.post('api/messages')
                .then((message) => {
                    this.messageForm.content = '';

                    this.messages.push(message);

            }, (response) => {
                // error callback
            });
        },
    }
}
