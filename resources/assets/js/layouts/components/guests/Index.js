export default {

    data: function() {
        return {
            guests: [],
            guestForm: {
                email: ''
            }
        }
    },

    mounted: function () {
        this.fetchGuests();
    },

    methods: {
        create(e) {
            this.$http.post('api/guests', this.guestForm)
                .then((response) => {
                    this.guestForm.email = '';

                    this.guests.push(response.data)
            }, (response) => {
                // error callback
            });
        },

        invite(guest) {
            this.$http.post('api/guests/' + guest.id  + '/invite')
                .then((response) => {
                    alert('Convite enviado com sucesso');
            }, (response) => {
                  alert('Error' + response.data);
            });
        },

        fetchGuests() {
            this.$http.get('api/guests')
                .then((response) => {
                   this.guests = response.data;
            });
        }
    }
}