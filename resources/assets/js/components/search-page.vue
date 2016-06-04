<template>
<div class="container">
  <br>
  <div class="alert alert-danger" role="alert" v-if="warning">
    {{ warning }}
  </div>
  <h1>Search</h1>
  <p>Search for your steam account, using your vanity URL</p>
  <div class="input-group">
    <input type="text" v-model="query" class="form-control" placeholder="Search..." @keyup.enter="search()">
    <span class="input-group-btn">
      <button class="btn btn-secondary" type="btn" @click="search()">Go!</button>
    </span>
  </div>
</div>
</template>

<script>
export default {
  data: function () {
    return {
      query: "",
      warning: ""
    }
  },

  methods: {
    search () {
      if (this.query) {
        this.$router.go(`/player/${this.query}`)
      }
      else {
        this.warning = 'Please enter a search query'
      }
    }
  }
}
</script>
