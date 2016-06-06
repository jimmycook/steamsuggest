<template>
<div class="card" v-if="player" >
    <img :src="player.info.avatarfull" class="card-img-top avatar-img" :>
    <div class="card-block">
        <h2>{{ player.info.personaname }}</h2>
        <span class="status-label" :class="'status-' + status">{{ status.charAt(0).toUpperCase() + status.slice(1) }}</span>
        <a :href="player.info.profileurl" target="_blank">View Steam Profile</a>
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
            if (this.player.info.gameid)  {
                return this.player.info.gameid
            }
            return false;
        },

        status () {
            if (!this.player.info) return;
            if (this.player.info.gameid) return 'playing';

            switch (this.player.info.personastate) {
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
$online-color: #509BB9;
$playing-color: #84AB38;
$offline-color: #6B6B6B;

.avatar-img {
    width: 100%;
    height: auto;
}

.status-label {

    color: #fff;
    padding: .4em;
    margin: 0;
    clear: both;
    border-radius: 2px;

    &.status-online,
    &.status-snooze,
    &.status-away,
    &.status-busy {
        background-color: $online-color;
    }
    &.status-playing {
        background-color: $playing-color;
    }
    &.status-offline {
        background-color: $offline-color;
    }
}


</style>
