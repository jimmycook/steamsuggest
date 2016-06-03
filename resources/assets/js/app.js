// import bootstrap from 'bootstrap'

import Vue from 'Vue'

Vue.use(require('vue-resource'));

import PlayedSearch from './components/played-search.vue'
import AvatarBox from './components/avatar-box.vue'
import SuggestedGame from './components/suggested-game.vue'

new Vue({
  el: '#app',
  components: {
    'suggested-game': SuggestedGame,
    'avatar-box': AvatarBox,
    'played-search': PlayedSearch
  },

  data: {
    player: null
  },

  ready () {
    console.log('ay')
    this.$dispatch('find-player', 'Jimmypq')
  },

  events: {

    'find-player' (vanity) {
      console.log(vanity, "Searching for this player")

      this.$http.get(`/api/player/${vanity}`).then(
        (res) => {this.player = res.data},
        (res) => console.log('Something went wrong...'))
    }
  }
})
