<template>
<div class="container">
  <alert :visible.sync="alertVisible" type="warning">
    Please fix your search query to continue.
  </alert>
  <div class="card">

    <div class="card-block">
      <h2 class="card-title">Search</h1>

      <p class="card-text">Search for your steam account, using your vanity URL</p>

      <div class="input-group">
        <input type="text" v-model="query" class="form-control" placeholder="Search..." @keyup.enter="search()" :disabled="searching">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="btn" @click="search()">{{ buttonText }}</button>
        </span>
      </div>
    </div>
  </div>

</div>


</template>

<script>
import Alert from '../elements/alert.vue'

export default {
  components: { Alert },

  props: {
    player: {
      default: null
    }
  },

  watch: {
    'player' (val, old) {
      if (this.searching && val != old && val.status) {
        this.$router.go('/player/' + this.query)
      }
      else if (this.searching && val != old && !val.status) {
        this.searching = false
        this.buttonText = 'Go!'
        this.alertVisible = true
      }
    }
  },

  data: function () {
    return {
      query: "",
      searching: false,
      buttonText: 'Go!',
      alertVisible: false
    }
  },

  methods: {
    search () {
      if (this.query) {
        this.searching = true
        this.buttonText = 'Searching...'
        this.$dispatch('search-for', this.query)
      }
      else {
        this.alertVisible = true
      }
    }
  }
}
</script>
