<template>
  <div class="c-close-button">
    <svg class="c-close-button__icon" id="close_button" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.28 28.28">
      <polygon points="28.28 22.63 19.8 14.14 28.28 5.66 22.63 0 14.14 8.48 5.66 0 0 5.66 8.48 14.14 0 22.63 5.66 28.28 14.14 19.8 22.63 28.28 28.28 22.63" style="fill: #fff"/>
    </svg>
  </div>
</template>

<style lang="scss" scoped>
  .c-close-button {
    cursor: pointer;
    position: relative;
    display: inline-block;
    padding: 1vw;
    border-radius: 50%;
    background: rgb(255,0,253);
    background: -moz-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    background: linear-gradient(180deg, rgba(255,0,253,1) 0%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff00fd",endColorstr="#f9101e",GradientType=1);
    box-shadow: 0 1px 2px rgba(255,255,255,0.15);
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
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
    &__icon {
      width: 0.800vw;
    }
  }
</style>

<script>
export default {
  
}
</script>