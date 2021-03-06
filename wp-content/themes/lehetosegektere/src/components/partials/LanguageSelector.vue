<template>
  <div class="c-language-selector">
    <select name="language" v-model="$i18n.locale">
      <option value="hu">HU</option>
      <option value="en">EN</option>
    </select>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-language-selector {
    display: inline-block;
    @include media("<=tablet") {
      margin-top: 4vw;
      font-size: 4vw;
    }
    @include media(">tablet") {
      font-size: $text-lg-desktop;
      border: 0.12vw solid #000;
    }
    & select {
      display: flex;
      @include media("<=tablet") {
        font-size: 4vw;
      }
      @include media(">tablet") {
        font-size: 0.7vw;
      }
    }
  }
</style>

<script>
export default {

}
</script>