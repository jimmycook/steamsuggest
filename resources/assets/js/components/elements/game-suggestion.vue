<template>
<div class="card">
    <div class="card-block">
        <h2 class="header-text">{{player.info.personaname }} has played {{ gamesPlayed }} of {{ player.games.game_count }} games in their library</h2>
        <p>
            {{ playedPercentage }}% of owned games         <span class="pull-sm-right"><small>Note: this does not include family sharing games.</small></span>
        </p>
    </div>
</div>

<div class="card">
    <div class="card-block">
        <h3>
            Game Suggestions
        </h3>
        <suggestion></suggestion>
        <suggestion></suggestion>
        <suggestion></suggestion>
        <suggestion></suggestion>
    </div>


</div>

<div></div>
</template>

<script>
import Suggestion from './suggestion.vue'

export default {
    props: {
        player: {
            default: null
        }
    },

    components: {
        Suggestion
    },

    computed: {
        gamesPlayed() {
            return this.player.games.played
        },

        playedPercentage() {
            const games = this.gamesPlayed
            const played = this.player.games.game_count
            return Math.round(games / played * 100)
        }
    }
}
</script>

<style lang="scss">
.header-text {

}
</style>
