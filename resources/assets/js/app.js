// import bootstrap from 'bootstrap'

import Vue from 'Vue'

Vue.use(require('vue-resource'));

import PlayedSearch from './components/played-search.vue'

new Vue({
  el: '#app',
  components: {
    'played-search': PlayedSearch
  },

  data: {
    message: 'Hello Vue.js!'
  }
})
