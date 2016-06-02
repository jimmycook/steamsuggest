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

  events: {
    'set-player': function (player) {
      this.$data.player = player;
    }
  }
})
