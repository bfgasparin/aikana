import UploadPainel  from './../../components/UploadPainel.vue';
import MessagesNotification  from './../../components/MessagesNotification.vue';

export default {

    props: {
        duration: {
          type: Number,
          default: 4500
        },
    },
    components: {
        UploadPainel, MessagesNotification
    },

    data: function() {
        return {            
            mainPhoto: null
        }
    },

    created: function () {
        this.fetchLatestPhoto();
    },

    mounted: function () {
        this.setRefreshTile();
    },

    destroyed () {
        this.$el.remove()
    },

    methods: {
        setRefreshTile(){
            this.timer = setTimeout(() => this.changePhoto(), this.duration);
        },

        changePhoto() {
          clearTimeout(this.timer)
          this.fetchLatestPhoto();
          this.setRefreshTile();

          this.$http.post('api/painel/photo', this.mainPhoto)
                .then((response) => {
                    //
            }, (response) => {
                // error callback
            });
          
        },

        fetchLatestPhoto () {
            this.$http.post('api/painel/latest', this.guestForm)
                .then((response) => {
                    this.mainPhoto = response.data.photo;
            }, (response) => {
                // error callback
            });
        }
    }
}
