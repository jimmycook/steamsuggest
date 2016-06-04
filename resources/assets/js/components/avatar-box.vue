<template>
<div class="avatar-box" v-if="player" >
    <div class="avatar-box--image" :class="'avatar-box--' + status">
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
        playing () {
            if (this.player.gameid)  {
                console.log(this.player)
                return this.player.gameid
            }
            return false;
        },

        status () {
            if (!this.player) return;

            if (this.player.gameid) return 'playing';

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
$online-color: blue;
$playing-color: green;


.avatar-box {

    background-color: white;

    display: flex;

    .avatar-box--image {
        border: grey solid 3px;
        border-radius: 5px;
        margin: 10px;

        &.avatar-box--online {
            border-color: $online-color;
        }
        &.avatar-box--playing {
            border-color: $playing-color;
        }
    }

    .avatar-box--info {
        margin: 24px;
    }
}


</style>
