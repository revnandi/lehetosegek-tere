<template>
  <div class="c-content">
    <slot></slot>
  </div>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-content {
    & h1 {
      @include media("<=tablet") {
        font-size: $text-md-mobile;
      }
      @include media(">tablet") {
        font-size: $text-xxl-desktop;
      }
    }
  }
</style>