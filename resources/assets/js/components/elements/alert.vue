<template>
<div class="alert alert-{{ type }}" v-show="visible" transition="fade">
    <slot></slot>
    <span v-if="dismissable" @click="dismiss()" class="dismiss-alert">&times;</span>
</div>
</template>

<script>
export default {
    props: {
        type: {
            default: 'danger'
        },
        dismissable: {
            default: true
        },
        visible: {
            default: true
        }
    },

    methods: {
      dismiss () {
        if (this.dismissable)
          this.visible = false
      }
    }
}
</script>

<style scoped>
.dismiss-alert {
    float: right;
    cursor: pointer;
}

.fade-transition {
  transition: all .3s ease;
}

.fade-enter, .fade-leave {
  opacity: 0;
}

</style>
