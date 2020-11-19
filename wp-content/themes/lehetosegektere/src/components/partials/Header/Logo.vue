<template>
  <div class="c-logo">
    <a href="/">
      <img class="c-logo__image" :src="this.logo.sizes.large" alt="">
    </a>
  </div>
</template>

<style lang="scss" scoped>
  .c-logo {
    width: calc(66.666% - 0.5rem);
    &__image {
      width: 100%;
    }
  }
</style>

<script>
export default {
  props: [
    'logo'
  ]
}
</script>