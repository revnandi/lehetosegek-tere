<template>
  <section :class="['l-section', colorModifierClass, widthModifierClass]">
    <div class="l-section__inner">
      <slot></slot>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    backgroundColor: {
      type: String,
      default: 'green',
    },
    isFullWidth: {
      type: Boolean,
      default: false,
    }
  },
  computed: {
    colorModifierClass() {
      if (this.backgroundColor) {
        return `l-section--${this.backgroundColor}`
      } else {
        return ``
      }
    },
    widthModifierClass() {
      if (this.isFullWidth) {
        return `l-section--full-width`
      } else {
        return ``
      }
    }
  }
}
</script>

<style lang="scss" scoped>
  .l-section {
    $self: &;
    &--white{
      background: #fff;
    }
    &--purple-red {
      background: rgb(232,60,225);
      background: linear-gradient(90deg, rgba(232,60,225,1) 0%, rgba(249,16,30,1) 100%);
    }
    &--orange-red {
      background: rgb(235,107,45);
      background: -moz-linear-gradient(90deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
      background: -webkit-linear-gradient(90deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
      background: linear-gradient(90deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
    }
    &--full-width {
      #{ $self }__inner {
      padding: 0;
      }
    }
    &__inner {
      padding: 3.475vw;
    }
  }
</style>