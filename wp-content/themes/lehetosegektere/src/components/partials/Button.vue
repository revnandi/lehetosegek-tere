<template>
  <button class="c-button">
    <div class="c-button__content">
      <slot></slot>
    </div>
  </button>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-button {
    position: relative;
    display: inline-block;
    border-radius: 50px;
    background: rgb(255,0,253);
    background: -moz-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff00fd",endColorstr="#f9101e",GradientType=1);
    box-shadow: 0 1px 2px rgba(255,255,255,0.15);
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    @include media("<=tablet") {
      width: 70vw;
      padding: 2vw;
    }
    @include media(">tablet") {
      width: 13.800vw;
    }
    &::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
      width: 100%;
      height: 100%;
      opacity: 0;
      border-radius: 50px;
      box-shadow: 0 0 0 0.125em rgba(255,255,255,0.3);
      opacity: 0;
      transition: opacity 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }
    &:hover {
      transform: scale(1.025);
    }
    &:hover::after {
      opacity: 1;
    }
    &:focus {
      outline: none;
      box-shadow: 0 0 0 0.15em #fff;
    }
    &__content {
      padding: 1.150vw 0;
      color: #fff;
      font-size: 0.625vw;
      text-transform: uppercase;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop;
      }
    }
  }
</style>

<script>
export default {
  
}
</script>