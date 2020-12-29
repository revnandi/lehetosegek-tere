<template>
  <svg class="c-gradient-heart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 341.42 312.13">
    <defs>
      <linearGradient id="gradient-heart-linear-gradient" x1="120.71" y1="100" x2="220.71" y2="100" gradientTransform="translate(-20.71 150) rotate(-45)" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-color="#f9101e"/>
        <stop offset="1" stop-color="#ff00fd"/>
      </linearGradient>
      <linearGradient id="gradient-heart-linear-gradient-2" x1="20.71" y1="100" x2="120.71" y2="100" xlink:href="#gradient-heart-linear-gradient"/>
      <linearGradient id="gradient-heart-linear-gradient-3" x1="220.71" y1="150" x2="220.71" y2="250" xlink:href="#gradient-heart-linear-gradient"/>
      <linearGradient id="gradient-heart-linear-gradient-4" x1="120.71" y1="100" x2="320.71" y2="100" gradientTransform="translate(-20.71 150) rotate(-45)" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-color="#f9101e"/>
        <stop offset="0.17" stop-color="#f91021"/>
        <stop offset="0.31" stop-color="#f90f2b"/>
        <stop offset="0.44" stop-color="#fa0e3c"/>
        <stop offset="0.56" stop-color="#fa0c54"/>
        <stop offset="0.67" stop-color="#fb0a73"/>
        <stop offset="0.78" stop-color="#fc0799"/>
        <stop offset="0.89" stop-color="#fe04c5"/>
        <stop offset="0.99" stop-color="#ff00f8"/>
        <stop offset="1" stop-color="#ff00fd"/>
      </linearGradient>
    </defs>
    <title>Szív</title>
    <g id="gradient-heart-layer_2" data-name="gradient-heart-layer 2">
      <g id="gradient-heart-layer_1-2" data-name="gradient-heart-layer 1">
        <g>
          <path d="M29.29,29.29,170.71,170.71l70.71,70.71,70.71-70.71L170.71,29.29A100,100,0,0,0,29.29,29.29Z" style="fill: url(#gradient-heart-linear-gradient)"/>
          <path d="M29.29,170.71,170.71,312.13l70.71-70.71-70.71-70.71L29.29,29.29A100,100,0,0,0,29.29,170.71Z" style="fill: url(#gradient-heart-linear-gradient-2)"/>
          <path d="M170.71,170.71l70.71,70.71,70.71-70.71a100,100,0,0,0,0-141.42Z" style="fill: url(#gradient-heart-linear-gradient-3)"/>
          <path d="M312.13,29.29a100,100,0,0,0-141.42,0L241.42,100Z" style="fill: url(#gradient-heart-linear-gradient-4)"/>
        </g>
      </g>
    </g>
  </svg>
</template>

<style lang="scss" scoped>
  @import "../../../assets/css/breakpoints.scss";
  @import "../../../assets/css/variables.scss";
  .c-gradient-heart {
    @include media("<=tablet") {
      width: 34vw;
    }
    @include media(">tablet") {
      width: 8.950vw;
    }
  }
</style>

<script>
export default {
  
}
</script>