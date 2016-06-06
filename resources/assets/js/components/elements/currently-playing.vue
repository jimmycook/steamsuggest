<template>
<div class="card">

    <!-- <img class="card-img-top " :src="icon" alt="" /> -->
    <div class="card-block">
        Currently Playing: {{ game.name }}
    </div>
</div>
</template>

<script>
export default {
    props: [ 'game' ],

    computed: {
        icon() {
            return ``
        }
    },

    ready () {
    }
}
</script>
