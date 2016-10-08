import FileUpload from './../../../components/FileUpload.vue';

export default {

    props: ['user'],

    components: {FileUpload},

    data: function() {
        return {            
            photos: [],
            photoForm: {
              content : ''
            },
        }
    },

    mounted: function () {
        Echo.channel('photos')
          .listen('PhotoUploaded', (e) => {
              e.photo.user = e.user;
              this.photos.push(e.photo);
          });
    },

}