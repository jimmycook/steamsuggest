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
  // Setting up the use the history API instead of hashbang based routes
  hashbang: false,
  history: true,
  root: '/app'
})

// Bind the routes
router.map(Routes)

// Start the application on the div #app
router.start(App, '#app')
