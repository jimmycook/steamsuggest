<template>
<div>
  <navbar></navbar>
  <router-view :player.sync="player"+
               transition="fade"
               transition-mode="out-in"></router-view>
</div>
</template>

<script>
import Navbar from './elements/navbar.vue'

export default {

  data () {
    return {
      player: null
    }
  },

  components: { Navbar },

  events: {
    'search-for' (username) {
      this.$http.get(`/api/player/${username}`).then(
        (res) => {
          this.player = res.data

         },
        (res) => console.log('Something went wrong...'))
    }


  }


}
</script>
