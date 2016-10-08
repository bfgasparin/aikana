<template>
  <transition
    :name="transition"
    mode="in-out"
    appear
    :appear-active-class="enterClass"
    :enter-active-class="enterClass"
    :leave-active-class="leaveClass"
    @after-leave="afterLeave"
  >
      <div class="card notification is-fullwidth">
        <div class="container">
            <div class="card-image">
            <figure class="image">
              <img :src="photo.path_url" alt="">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-left">
                <figure class="image is-32x32">
                  <img :src="photo.user.avatar_url" alt="Image">
                </figure>
              </div>
              <div class="media-content">
                <p class="title is-5">{{ photo.user.name }}</p>
                <p class="subtitle is-6">{{ photo.created_at}}</p>
              </div>
            </div>
          </div>
        </div>
    </div>
</transition>
</template>

<script>
import Vue from 'vue'

export default {

  props: {
    photo: Object,
    direction: {
      type: String,
      default: 'Right'
    },
    duration: {
      type: Number,
      default: 4500
    },
    container: {
      type: String,
      default: '.notifications'
    }
  },

  data () {
    return {
      $_parent_: null,
      show: true,
    }
  },

  created () {
    let $parent = this.$parent
    if (!$parent) {
      let parent = document.querySelector(this.container)
      if (!parent) {
        // Lazy creating `div.notifications` container.
        parent = document.createElement('div')
        parent.classList.add(this.container.replace('.', ''))
        const Notifications = Vue.extend()
        $parent = new Notifications({
          el: parent
        })
        parent = $parent.$el
        document.body.appendChild(parent)
      }
      // Hacked.
      this.$_parent_ = parent.__vue__
    }
  },

  mounted () {
    if (this.$_parent_) {
      this.$_parent_.$el.appendChild(this.$el)
      this.$parent = this.$_parent_
      delete this.$_parent_
    }
    if (this.duration > 0) {
      this.timer = setTimeout(() => this.close(), this.duration)
    }
  },

  destroyed () {
    this.$el.remove()
  },

  computed: {
    transition () {
      return `bounce-${this.direction}`
    },

    enterClass () {
      return `bounceIn${this.direction}`
    },

    leaveClass () {
      return `bounceOut${this.direction}`
    },
  },

  methods: {
    close () {
      clearTimeout(this.timer)
      this.show = false
    },

    afterLeave () {
      this.$destroy()
    }
  }
}
</script>

<style lang="scss">
    @import '~bulma/sass/utilities/variables';
    @import '~bulma/sass/utilities/mixins';

    .notifications {
      position: fixed;
      top: 50px;
      right: 0;
      z-index: 1024 + 233;
      pointer-events: none;

      @include tablet() {
        max-width: 320px;
      }

      .notification {
        margin: 20px;
      }
    }

    .notification {
      position: relative;
      min-width: 240px;
      backface-visibility: hidden;
      transform: translate3d(0, 0, 0);
      pointer-events: all;
    }
</style>
