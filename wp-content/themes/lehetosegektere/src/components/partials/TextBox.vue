<template>
  <div class="c-textbox" :style="{ height: this.height }">
    <slot></slot>
    <a :href="this.url" class="c-textbox__link">Tovább</a>
  </div>
</template>

<style lang="scss" scope>
  @import "../../assets/css/variables.scss";
  @import "../../assets/css/breakpoints.scss";
  .c-textbox {
    $self: &;
    position: relative;
    height: 29.8vw;
    padding: 1.150vw;
    background-color: #fff;
    @include media("<=tablet") {
      font-size: 4.267vw;
      & a {
        display: block;
        text-align: center;
        padding: 1.5vw;
      }
    }
    @include media(">tablet") {
      font-size: 1.300vw;
    }
    &--hero {
      @include media("<=tablet") {
        height: auto;
      }
      @include media(">tablet") {
        height: 0!important;
        padding: 0 1.150vw calc((100% / 3) * 1) 1.150vw;
      }
      #{ $self }__inner {
        position: absolute;
      }
      & div {
      @include media("<=tablet") {
        padding: 1.5vw;
      }
      @include media(">tablet") {
        padding: 1.5vw 0 0.75vw 0;
      }
    }
    }
    &--location {
      @include media("<=tablet") {
        height: auto;
        & a {
          display: block;
          text-align: center;
          padding: 1.5vw;
        }
      }
      @include media(">tablet") {
      }
      #{ $self }__inner {
        position: absolute;
      }
      & div {
      @include media("<=tablet") {
        padding: 1.5vw;
      }
      @include media(">tablet") {
        padding: 0 0 0.75vw 0;
      }
    }
    }
    &__link {
      text-transform: uppercase;
      opacity: 1;
      transition: opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1);
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop
      }
      &:hover {
        opacity: 0.75;
      }
    }
  }
</style>

<script>
import Button from './Button';

export default {
  props: {
    height: {
      type: String,
      default: 'auto'
    },
    url: {
      type: String,
      default: '#'
    }
  },
  components: {
    Button
  }
}
</script>