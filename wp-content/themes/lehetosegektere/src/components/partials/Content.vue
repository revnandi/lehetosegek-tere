<template>
  <div class="c-content">
    <slot></slot>
  </div>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-content {
    margin: 0 auto;
    @include media(">tablet") {
      max-width: 60vw;
    }
    & h1 {
      @include media("<=tablet") {
        font-size: $text-md-mobile;
      }
      @include media(">tablet") {
        font-size: $text-xxl-desktop;
      }
    }
    & {
      a {
        color: #fa52f4;
        &:hover {
          opacity: 0.75;
        }
      }
    }
    & iframe {
      margin: 2rem auto;
    }
  }
</style>