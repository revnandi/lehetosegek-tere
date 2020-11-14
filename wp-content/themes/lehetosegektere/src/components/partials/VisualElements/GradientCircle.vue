<template>
  <div class="c-gradient-circle"></div>
</template>

<style lang="scss" scoped>
  .c-gradient-circle {
    width: 100%;
    height: 0;
    padding-top: 100%;
    border-radius: 50%;
    background: rgb(235,107,45);
    background: -moz-linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
    background: -webkit-linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
    background: linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
  } 
</style>

<script>
export default {
  
}
</script>