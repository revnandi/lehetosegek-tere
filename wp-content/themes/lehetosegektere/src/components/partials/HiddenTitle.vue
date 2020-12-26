<template>
  <h1 class="c-hidden-title">
    {{ text }}
  </h1>
</template>

<script>
export default {
  props: {
    text: {
      Type: String,
      default: ''
    }
  }
}
</script>