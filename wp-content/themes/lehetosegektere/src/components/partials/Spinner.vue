<template>
  <div class="c-spinner">
    <div class="c-spinner__ball"></div>
    <div class="c-spinner__ball"></div>
    <div class="c-spinner__ball"></div>
    <div class="c-spinner__ball"></div>
  </div>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  .c-spinner {
    display: inline-block;
    position: relative;
    @include media("<=tablet") {
    }
    @include media(">tablet") {
      width: 4vw; // 80px at 4000px
      height: 2vw; // 80px at 4000px
    }
  &__ball {
    position: absolute;
    border-radius: 50%;
    background: rgb(255,0,253);
    background: -moz-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff00fd",endColorstr="#f9101e",GradientType=1);
    animation-timing-function: cubic-bezier(0, 1, 1, 0);
    @include media("<=tablet") {
    }
    @include media(">tablet") {
      top: 0.75vw; // 33px at 4000px
      width: 0.4vw; // 13px at 4000px
      height: 0.4vw; // 13px at 4000px
    }
  }
  &__ball:nth-child(1) {
    @include media("<=tablet") {
    }
    @include media(">tablet") {
      left: 0.4vw; // 8px at 4000px
    }
    animation: spinner_1 0.6s infinite;
  }
  &__ball:nth-child(2) {
    @include media("<=tablet") {
    }
    @include media(">tablet") {
      left: 0.4vw; // 8px at 4000px
    }
    animation: spinner_2 0.6s infinite;
  }
  &__ball:nth-child(3) {
    @include media(">tablet") {
      left: 1.8vw; // 32px at 4000px
    }
    animation: spinner_2 0.6s infinite;
  }
  &__ball:nth-child(4) {
    @include media(">tablet") {
      right: 0.4vw; // 56px at 4000px
    }
    animation: spinner_3 0.6s infinite;
  }
  }
  @keyframes spinner_1 {
    0% {
      transform: scale(0);
    }
    100% {
      transform: scale(1);
    }
  }
  @keyframes spinner_3 {
    0% {
      transform: scale(1);
    }
    100% {
      transform: scale(0);
    }
  }
  @include media("<=tablet") {
    @keyframes spinner_2 {
    
    0% {
      transform: translate(0, 0);
    }
    100% {
      transform: translate(24px, 0);
    }
    }
  }
  @include media(">tablet") {
    @keyframes spinner_2 {
    
    0% {
      transform: translate(0, 0);
    }
    100% {
      transform: translate(1.4vw, 0); // 24px at 4000px
    }
  }
  }
</style>