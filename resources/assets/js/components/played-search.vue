<template>
  <div>
    <form>
      <input type="text"
      class="search-box"
      placeholder="Please enter your steam vanity name"
      @submit.prevent="search()"
      v-model="query">
      <button type="submit" class="btn btn-block btn-primary" @click.prevent="search()">Go</button>
    </form>
    <h3>{{ message }}</h3>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      query: "",
      storedQuery: "",
      response: {status: false},
      submitted: false
    }
  },
  computed: {
    message() {
      if (this.$data.response.status && this.submitted) {
        return "'" + this.$data.storedQuery +
        "' has played " + this.$data.response.played + ' out of ' + this.$data.response.games +
        " available games."
      }
    }

  },

  methods: {

    clear() {

      if (this.$data.response) {
        this.$data.response = { status: false }
        this.$data.submitted = false
      }

    },

    search() {

      this.$http.get('/api/' + this.$data.query + '/gamesplayed')
          .then(response => {
            if (response.data.status) {
              this.$data.storedQuery = this.$data.query
              this.$data.response = response.data
              this.$data.submitted = true
            }
            else {
              this.$data.response = {status: false}
            }
          }, response => console.log('whoops'))
    }

  }
}
</script>

<style scoped>
.search-box {
  width: 100%;
  margin: auto;
  height: 45px;
  margin-top: 10px;
  padding: 3px 10px;
}

.btn {
  margin-top: 10px;
}

h3 {
  text-align: center;
  padding-top: 10px;
}
</style>
