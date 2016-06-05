// import bootstrap from 'bootstrap'

import Vue from 'Vue'
import VueRouter from 'vue-router'

Vue.use(require('vue-resource'));
Vue.use(VueRouter);

// App container component
import App from './components/app.vue'
import Routes from './routes.js'

// Setup the router
var router = new VueRouter({
  // Setting up the use the history API instead of hashbanged routes
  hashbang: false,
  history: true,
  root: '/app'
})

router.map(Routes)

router.start(App, '#app')


// new Vue({
//   el: '#app',
//   components: {
//     'suggested-game': SuggestedGame,
//     'avatar-box': AvatarBox,
//     'played-search': PlayedSearch
//   },
//
//   data: {
//     player: null
//   },
//
//   ready () {
//     this.$dispatch('find-player', 'Jimmypq')
//   },
//
//   events: {
//
//     'find-player' (vanityUrl) {
//
//       this.$http.get(`/api/player/${vanityUrl}`).then(
//         (res) => {this.player = res.data},
//         (res) => console.log('Something went wrong...'))
//     }
//   }
// })
