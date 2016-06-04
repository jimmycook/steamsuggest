<template>
<div class="container">
  <div v-if="player">
    <avatar-box :player="player"></avatar-box>
    <pre>
      {{ player | json 4 }}
    </pre>
  </div>
  <loader v-show="!player" transition="fade"></loader>
</div>
</template>

<script>
import Loader from './loader.vue'
import AvatarBox from './avatar-box.vue'

export default {
  data: function () {
    return {
      player: null


    }
  },

  ready () {
    const username = this.$route.params.username

    if (username) {
      this.$http.get(`/api/player/${username}`).then(
        (res) => { this.player = res.data },
        (res) => console.log('Something went wrong...')
      )
    }
  },

  components: {
    Loader, AvatarBox
  }
}
</script>

<style media="screen">
  .fade-transition {
    transition: opacity .3s ease;

  }

  .fade-enter, .fade-leave {
    opacity: 0;
  }
</style>
