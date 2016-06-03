<template>
<div class="avatar-box" v-if="player" >
    <div class="avatar-box--image avatar-box--image-{{ player.status }}">
        <img :src="player.avatarfull" alt="Player avatar">
    </div>
    <div class="avatar-box--info">
        <h2>{{ player.personaname }}</h2>
        <p>{{ status.charAt(0).toUpperCase() + status.slice(1) }}</p>
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
            if (!this.player) return;

            switch (this.player.personastate) {
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

    .avatar-box--image {

        margin: 10px;
    }

    .avatar-box--info {
        margin: 24px;
    }
}


</style>
