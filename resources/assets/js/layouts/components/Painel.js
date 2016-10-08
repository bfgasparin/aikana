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
            painelPhoto: null
        }
    },

    created: function () {
        this.fetchLatestPhoto();
    },

    mounted: function () {
        this.setRefreshTile();
        Echo.channel('painel')
          .listen('PhotoStared', (e) => {
                this.painelPhoto.stars++;
        });
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
        },

        fetchLatestPhoto () {
            this.$http.get('api/painel/new')
                .then((response) => {
                    this.painelPhoto = response.data;
                    this.painelPhoto.stars = this.painelPhoto.total_stars;
            }, (response) => {
                // error callback
            });
        }
    }
}
