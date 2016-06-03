<template>
<div class="avatar-box" v-show="player" >
    <div class="avatar-box--image">
        <img :src="player.avatarfull" alt="Player avatar">
    </div>
    <div class="avatar-box--info">
        <h2>{{ player.personaname }}</h2>
        <p>{{ status.capitalize() }}</p>
    </div>
</div>
</template>

<script>
export default {
    props: {
        player: {
            default: null
        }
    },

    computed: {
        status () {
            if (!this.player) {
                return 'nope'
            }

            const state = this.player.personastate

            // 0 - Offline,
            // 1 - Online,
            // 2 - Busy,
            // 3 - Away,
            // 4 - Snooze,
            // 5 - looking to trade,
            // 6 - looking to play.

            switch (state) {
                case 0:
                    return 'offline'
                    break
                case 2:
                    return 'busy'
                    break
                case 3:
                    return 'away'
                    break
                case 4:
                    return 'snooze'
                    break
                default:
                    return 'online'

            }
        }
    }
}
</script>

<style lang="sass">
.avatar-box {

    background-color: white;

    display: flex;

    img {
        width: 140px;
        height: 140px;
        margin: 10px
    }

    .avatar-box--info {
        margin: 24px;
    }
}


</style>
