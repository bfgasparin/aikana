export default {

    data: function() {
        return {
            image: this.avatar,
            socialImage : this.avatar,
            file: null,
            manual: false,
        }
    },

    computed: {
        avatarFile: function () { return this.image || 'http://placehold.it/128x128' },
        showManual: function () { return this.manual || this.hasError }
    },

    methods: {
        onFileChange(e) {
          var files = e.target.files || e.dataTransfer.files;
          if (!files.length)
            return;
          this.createImage(files[0]);
          this.file = files[0];
        },
        createImage(file) {
          var image = new Image();
          var reader = new FileReader();
          var vm = this;

          reader.onload = (e) => {
            vm.image = e.target.result;
          };
          reader.readAsDataURL(file);
        },
        removeImage: function (e) {
          this.image = '';
          this.socialImage = '';
          this.file = '';
        },

        activeManualRegister: function() {
            this.manual = true;
        },

        inactiveManualRegister: function() {
            this.manual = false;
        }
  }
}
