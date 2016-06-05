<template>
<div class="container">
  <div v-if="player" class="row">
    <div class="col-sm-3">
      <avatar-box :player="player"></avatar-box>
    </div>
    <div class="col-sm-6">
      <game-suggestion :player=""></game-suggestion>
    </div>
  </div>
  <loader v-show="!player" transition="fade"></loader>
  <div v-if="player" class="card" style="margin-top: 1em;">
    <div class="card-block">
      <pre>
        {{ player | json 4 }}
      </pre>
    </div>
  </div>
</div>
</template>

<script>
import Loader from '../elements/loader.vue'
import AvatarBox from '../elements/avatar-box.vue'

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
