<template>
  <svg class="c-gradient-double-half-circles" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400">
    <defs>
      <linearGradient id="double-circle-linear-gradient" x1="100" x2="100" y2="400" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-color="#f9101e"/>
        <stop offset="1" stop-color="#eb6b2d"/>
      </linearGradient>
      <linearGradient id="double-circle-linear-gradient-2" x1="300" x2="300" y2="400" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-color="#eb6b2d"/>
        <stop offset="1" stop-color="#f9101e"/>
      </linearGradient>
    </defs>
    <title>Gradient half circles</title>
    <g id="double-circle--ayer_2" data-name="double-circle--ayer 2">
      <g id="double-circle--ayer_1-2" data-name="double-circle--ayer 1">
        <g>
          <path d="M0,0C110.46,0,200,89.54,200,200S110.46,400,0,400" style="fill: url(#double-circle-linear-gradient)"/>
          <path d="M400,400c-110.46,0-200-89.54-200-200S289.54,0,400,0" style="fill: url(#double-circle-linear-gradient-2)"/>
        </g>
      </g>
    </g>
  </svg>
</template>

<style lang="scss" scoped>
  .c-gradient-double-half-circles {
    width: 100%;
  }
</style>

<script>
export default {
  
}
</script>