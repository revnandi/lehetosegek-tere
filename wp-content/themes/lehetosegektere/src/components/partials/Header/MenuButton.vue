<template>
  <div class="c-menu-button" :class="{ 'c-menu-button--opened' : isOpened }">
    <div class="c-menu-button__inner">
      <span class="c-menu-button__line"></span>
      <span class="c-menu-button__line"></span>
      <span class="c-menu-button__line"></span>
    </div>
  </div>
</template>

<style lang="scss">
  @import "../../../assets/css/breakpoints.scss";
  .c-menu-button {
    $self: &;
    @include media("<=tablet") {
      position: fixed;
      top: 0;
      right: 0;
      display: inline-block;
      padding: calc(3.475vw - 1.7375vw);
      margin: 1.7375vw;
      font-size: 6vw;
      cursor: pointer;
      line-height: 1;
      border-radius: 8px;
      background: rgb(255,0,253);
      background: -moz-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
      background: -webkit-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
      background: linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff00fd",endColorstr="#f9101e",GradientType=1);
      z-index: 3;
    }
    @include media(">tablet") {
      display: none;
    }
    &__inner {
      position: relative;
      width: 5vw;
      height: 5vw;
    }
    &__line {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 1vw;
      background-color: #fff;
      -webkit-transition: top 0.2s ease-in-out 0.4s, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out, -webkit-transform 0.4s ease-in-out;
      transition: top 0.2s ease-in-out 0.4s, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out, -webkit-transform 0.4s ease-in-out;
      -o-transition: top 0.2s ease-in-out 0.4s, transform 0.4s ease-in-out, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out;
      transition: top 0.2s ease-in-out 0.4s, transform 0.4s ease-in-out, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out;
      transition: top 0.2s ease-in-out 0.4s, transform 0.4s ease-in-out, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out, -webkit-transform 0.4s ease-in-out;
      &:nth-child(1) {
        top: 0;
      }
      &:nth-child(2), &:nth-child(4) {
        top: calc(50% - (1vw / 2));
      }
      &:nth-child(3) {
        top: calc(100% - 1vw);
      }
    }
    &--opened #{ $self }__line {
      -webkit-transition: top 0.2s ease-in-out, opacity 0.1s ease-in-out 0.2s, -webkit-transform 0.4s ease-in-out 0.2s;
      transition: top 0.2s ease-in-out, opacity 0.1s ease-in-out 0.2s, -webkit-transform 0.4s ease-in-out 0.2s;
      -o-transition: top 0.2s ease-in-out, transform 0.4s ease-in-out 0.2s, opacity 0.1s ease-in-out 0.2s;
      transition: top 0.2s ease-in-out,transform 0.4s ease-in-out 0.2s, opacity 0.1s ease-in-out 0.2s;
      transition: top 0.2s ease-in-out, transform 0.4s ease-in-out 0.2s, opacity 0.1s ease-in-out 0.2s, -webkit-transform 0.4s ease-in-out 0.2s;
    }
    &--opened #{ $self }__line:nth-child(1) {
      top: calc(50% - (1vw / 2));
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
    &--opened #{ $self }__line:nth-child(2) {
      top: calc(50% - (1vw / 2));
      opacity: 0; }
    &--opened #{ $self }__line:nth-child(3) {
      top: calc(50% - (1vw / 2));
      -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }
  }
</style>

<script>
export default {
  props: {
    isOpened: {
      type: Boolean,
      default: false
    }
  }
}
</script>