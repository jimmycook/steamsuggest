// Import components
import SearchPage from './components/routes/search.vue'
import Player from './components/routes/player.vue'

import NotFound from './components/routes/not-found.vue'
import PlayerNotFound from './components/routes/player-not-found.vue'

export default {

  '/player/:username': {
    component: Player

    subRoutes: {
      '/not-found': {
        component: PlayerNotFound
      }
    }
  },
  '*': {
    component: SearchPage
  }
}
