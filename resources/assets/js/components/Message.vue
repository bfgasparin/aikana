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
      <article class="media notification animated" v-if="show" :class="[ fromCurrentUser ? 'is-light' : 'is-info']">
          <figure class="media-left">
            <p class="image is-64x64">
              <img :src="message.user.avatar_url">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              <p>
                <strong v-if="message.username">{{ message.username }}</strong> <small> message.created_at </small>
                <br>
                {{ message.content }}
              </p>
            </div>
          </div>
          <div class="media-right">
              <button class="delete touchable" @click="close()"></button>
          </div>
        </article>
</transition>
</template>

<script>
import Vue from 'vue'

export default {

  props: {
    message: Object,
    fromCurrentUser: Boolean,
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
