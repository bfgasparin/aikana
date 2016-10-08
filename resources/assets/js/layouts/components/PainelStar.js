import Upload  from './../../components/Upload.vue';

export default {

    props: {
        duration: {
          type: Number,
          default: 4500
        },
    },
    components: {
        Upload
    },

    data: function() {
        return {            
            painelPhoto: null,
        }
    },


    created: function () {
        this.fetchLatestPhoto();
    },

    mounted: function () {
        Echo.channel('painel')
          .listen('PainelPhotoAdded', (e) => {
                this.painelPhoto = e.painelPhoto;
                this.painelPhoto.photo = e.photo;
                this.painelPhoto.photo.user = e.user;
        });
    },

    methods: {
        star(){
            this.$http.post('/api/painel/stars', this.painelPhoto)
                .then((response) => {

            }, (response) => {
                // error callback
            });
        },

        fetchLatestPhoto () {
            this.$http.get('/api/painel/latest')
                .then((response) => {
                    this.painelPhoto = response.data;
            }, (response) => {
                // error callback
            });
        }        
    }
}
