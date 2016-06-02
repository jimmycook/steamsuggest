<template>
  <div>
    <form>
      <input type="text"
      class="search-box"
      placeholder="Please enter your steam vanity name"
      @submit.prevent="search()"
      v-model="query">
      <button type="submit"
              class="btn btn-block btn-primary"
              @click.prevent="search()"
              :class="searching ? 'm-progress' : ''">
        <span v-show="!searching">Go</span>
      </button>
    </form>
    <pre>{{ player | json 4 }}</pre>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      query: "",
      message: "",
      dispatched: false
    }
  },

  computed: {
    searching() {
      if (this.dispatched && !this.player)
      {
        return true
      }
      return false
    }
  },

  props: {
    player: {
      default: null
    }
  },

  methods: {

    search() {
      // dispatch the search event
      this.$dispatch('find-player', this.query)
      this.dispatched = true
    }

  },

  events: {
    'player-set' () {
      this.dispatch = false
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

@-webkit-keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@-moz-keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@-o-keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}

.m-progress {
    position: relative;
    opacity: .8;
    color: transparent !important;
    text-shadow: none !important;
}

.m-progress:hover,
.m-progress:active,
.m-progress:focus {
    cursor: default;
    color: transparent;
    outline: none !important;
    box-shadow: none;
}

.m-progress:before {
    content: '';

    display: inline-block;

    position: absolute;
    background: transparent;
    border: 1px solid #fff;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-radius: 50%;

    box-sizing: border-box;

    top: 50%;
    left: 50%;
    margin-top: -12px;
    margin-left: -12px;

    width: 24px;
    height: 24px;

    -webkit-animation: ld 1s ease-in-out infinite;
    -moz-animation:    ld 1s ease-in-out infinite;
    -o-animation:      ld 1s ease-in-out infinite;
    animation:         ld 1s ease-in-out infinite;
}

.btn-default.m-progress:before {
    border-left-color: #333333;
    border-right-color: #333333;
}

.btn-lg.m-progress:before {
    margin-top: -16px;
    margin-left: -16px;

    width: 32px;
    height: 32px;
}

.btn-sm.m-progress:before {
    margin-top: -9px;
    margin-left: -9px;

    width: 18px;
    height: 18px;
}

.btn-xs.m-progress:before {
    margin-top: -7px;
    margin-left: -7px;

    width: 14px;
    height: 14px;
}

</style>
