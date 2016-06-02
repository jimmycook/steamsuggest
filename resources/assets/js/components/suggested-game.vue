<template>
<div>
    Suggested Game Here
</div>
</template>

<script>
export default {
    data: function () {
        return {
            message: "Hello world"
        }
    },

    props: ['player'],

    ready() {
        console.log('It worked');
    },

    methods: {
        setPlayer() {
            const player = {
                name: 'yer maw'
            }

            this.$dispatch('set-player', player)

        }
    }
}
</script>
