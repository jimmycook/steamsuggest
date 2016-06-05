<template>
<div class="container">
  <alert :visible.sync="alertVisible" type="warning">
    Please enter a search query.
  </alert>
  <div class="card">

    <div class="card-block">
      <h2 class="card-title">Search</h1>

      <p class="card-text">Search for your steam account, using your vanity URL</p>

      <div class="input-group">
        <input type="text" v-model="query" class="form-control" placeholder="Search..." @keyup.enter="search()">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="btn" @click="search()">Go!</button>
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

  data: function () {
    return {
      query: "",
      alertVisible: false
    }
  },

  methods: {
    search () {
      if (this.query) {
        this.$router.go(`/player/${this.query}`)
      }
      else {
        this.alertVisible = true
      }
    }
  }
}
</script>
