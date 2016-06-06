<template>
<div class="container">
  <div v-if="player.status" class="row">
    <div class="col-sm-3">
      <avatar-box :player="player"></avatar-box>
    </div>
    <div class="col-sm-6">
      <game-suggestion :player=""></game-suggestion>
      <router-view :player="player"></router-view>
      <pre>{{ player | json }}</pre>
    </div>
  </div>
  <div class="card" v-if="!player.status">
    <div class="card-block"><h2>Player not found...</h2></div>
  </div>
  <loader v-show="!player" transition="fade"></loader>
</div>
</template>

<script>
import Loader from '../elements/loader.vue'
import AvatarBox from '../elements/avatar-box.vue'
import GameSuggestion from '../elements/game-suggestion.vue'

export default {
  data: function () {
    return {
    }
  },

  props: {
    player: {
      default: null
    }
  },

  ready () {
    if (!this.player && this.$route.params.username) {
      this.$dispatch('search-for', this.$route.params.username)
    }
  },

  components: {
    Loader, AvatarBox, GameSuggestion
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
