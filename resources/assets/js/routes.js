// Import components
import SearchPage from './components/routes/search.vue'
import Player from './components/routes/player.vue'

import NotFound from './components/routes/not-found.vue'
import Test from './components/test.vue'
import PlayerNotFound from './components/routes/player-not-found.vue'

export default {

  '/player/:username': {
    component: Player,

    subRoutes: {
      // '/': {
      //   component: {
      //     template: '<p>Default sub view</p>'
      //   }
      // },
      '/test': {
        component: Test
      }
    }
  },
  '*': {
    component: SearchPage
  }
}
