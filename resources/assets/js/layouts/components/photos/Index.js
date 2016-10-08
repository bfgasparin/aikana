import FileUpload from './../../../components/FileUpload.vue';
import Upload from './../../../components/Upload.vue';

export default {

    props: ['user'],

    components: {FileUpload, Upload},

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