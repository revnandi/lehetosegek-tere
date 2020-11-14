<template>
  <div class="l-grid" :style="{ rowGap: this.rowGap }">
      <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    rowGap: {
      type: String,
      default: 'initial'
    }
  }
}
</script>

<style lang="scss" scoped>
  .l-grid {
    position: relative;
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    column-gap: 0.825vw;
  }
</style>