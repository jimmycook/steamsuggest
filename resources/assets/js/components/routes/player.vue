<template>
<div class="container">
  <div v-if="player">
    <div v-if="player.status" class="row">
      <div class="col-sm-3">
        <avatar-box :player="player"></avatar-box>
        <currently-playing v-if="currentGame"
                           :game="currentGame"></currently-playing>
      </div>
      <div class="col-sm-9">

        <game-suggestion :player="player"></game-suggestion>
        <router-view :player="player"></router-view>        
      </div>
    </div>
    <div class="card" v-if="!player.status">
      <div class="card-block"><h2>Player not found...</h2></div>
    </div>
  </div>


  <loader v-show="!player" transition="fade"></loader>
</div>
</template>

<script>
import Loader from '../elements/loader.vue'
import AvatarBox from '../elements/avatar-box.vue'
import CurrentlyPlaying from '../elements/currently-playing.vue'
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

  computed: {
    /**
     * Get the game the player is currently playing
     * @return {boolean|Object} [description]
     */
    currentGame() {
      if (this.player.info.gameid) {
        for (let game of this.player.games.games) {
          if (game.appid == this.player.info.gameid)
            return game
        }
      }
      return false

    }
  },

  ready () {
    if (!this.player && this.$route.params.username) {
      this.$dispatch('search-for', this.$route.params.username)
    }
  },

  components: {
    Loader, AvatarBox, GameSuggestion, CurrentlyPlaying
  }
}
</script>

<style media="screen">

</style>
