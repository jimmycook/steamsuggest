// import bootstrap from 'bootstrap'

import Vue from 'Vue'
import VueRouter from 'vue-router'

Vue.use(require('vue-resource'));
Vue.use(VueRouter);

// App container component
import App from './components/app.vue'
// Routes
import SearchPage from './components/search-page.vue'
import Player from './components/player.vue'

var router = new VueRouter({
    hashbang: false,
    history: true,
    root: '/app'
})

router.map({

    '/search': {
        component: SearchPage
    },
    '/player/:username': {
        component: Player
    }

})

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
