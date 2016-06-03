// import bootstrap from 'bootstrap'

import Vue from 'Vue'
import VueRouter from 'vue-router'

console.log(VueRouter)

Vue.use(require('vue-resource'));
Vue.use(VueRouter);

import PlayedSearch from './components/played-search.vue'
import AvatarBox from './components/avatar-box.vue'
import SuggestedGame from './components/suggested-game.vue'

var Foo = Vue.extend({
    template: '<p>This is foo!</p>'
})

var Bar = Vue.extend({
    template: '<p>This is bar!</p>'
})

var App = Vue.extend({})

var router = new VueRouter()

router.map({
    '/foo': {
        component: Foo
    },
    '/bar': {
        component: Bar
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
