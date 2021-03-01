<template>
  <div class="c-loader">
    <Spinner></Spinner>
  </div>
</template>

<style lang="scss">
  .c-loader {
    min-height: 50vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

<script>
import Spinner from './Spinner'

export default {
  components: {
    Spinner
  }
}
</script>