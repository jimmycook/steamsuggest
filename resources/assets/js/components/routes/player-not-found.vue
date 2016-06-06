<template>
<div class="container">
    <div class="card">
        <div class="card-block">
            <h1>The player {{ params.username }} wasn't found</h1>
            <a v-link="{ path: '/' }">Click here to continue</a>
        </div>
    </div>
</div>
</template>

<script>
export default {
    created () {
        const username = this.params.username
        console.log(this)
        return
        this.$http.get(`/api/player/${username}`).then(
          (res) => {
            if(res.data)
              this.$router.go('/player/' + this.username)
            },
          (res) => console.log('Something went wrong...')
        )
    }
}

</script>
