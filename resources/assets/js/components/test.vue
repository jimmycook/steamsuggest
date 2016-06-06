<template>
<div >
    <button @click="log()" class="btn btn-primary">Log</button>
    <pre v-show="player">{{ player | json 4}}</pre>
</div>
</template>

<script>
export default {
    props: {
        player: {
            default: null
        }
    },

    methods: {
        log() {
            console.log(this.player)
        }
    },
}
</script>
