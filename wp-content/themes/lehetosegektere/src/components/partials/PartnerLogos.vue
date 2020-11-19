<template>
  <div class="c-partner-logos">
    <ErsteLogo width="3.825vw"/>
    <TranzitLogo width="1.550vw"/>
  </div>
</template>

<style lang="scss" scoped>
  .c-partner-logos {
    position: relative;
    display: flex;
    justify-content: flex-end;
    padding: 0.775vw 0 1.175vw 0;
    & > * {
      margin-left: 0.875vw;
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