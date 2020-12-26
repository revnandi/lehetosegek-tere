<template>
  <div class="c-partner-logos">
    <ErsteLogo/>
    <TranzitLogo/>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  .c-partner-logos {
    position: relative;
    display: flex;
    justify-content: flex-end;
    padding: 0.775vw 0 1.175vw 0;
    svg:first-child {
      @include media("<=tablet") {
        width: 19.525vw;
      }
      @include media(">tablet") {
        width: 3.825vw;
      } 
    }
    svg:last-child {
      @include media("<=tablet") {
        width: 7.7vw;
        margin-left: 3.375vw;
      }
      @include media(">tablet") {
        width: 1.550vw;
        margin-left: 0.875vw;
      } 
    }
  }
</style>

<script>
import ErsteLogo from "./VisualElements/ErsteLogo";
import TranzitLogo from "./VisualElements/TranzitLogo";

export default {
  components: {
    ErsteLogo,
    TranzitLogo
  }
}
</script>