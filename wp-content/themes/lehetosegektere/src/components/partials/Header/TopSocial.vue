<template>
  <ul v-if="allOptionsLoaded" class="c-top-social">
    <li :v-if="allOptions.social_media.facebook.visible" class="c-top-social__item">
      <a :href="allOptions.social_media.facebook.link" target="blank_" rel="noopener">Facebook</a>
    </li>
    <li :v-if="allOptions.social_media.instagram.visible" class="c-top-social__item">
      <a :href="allOptions.social_media.instagram.link" target="blank_" rel="noopener">Insta</a>
    </li>
    <li :v-if="allOptions.social_media.youtube.visible" class="c-top-social__item">
      <a :href="allOptions.social_media.youtube.link" target="blank_" rel="noopener">Youtube</a>
    </li>
  </ul>
</template>

<style lang="scss" scoped>
  @import "../../../assets/css/breakpoints.scss";
  .c-top-social {
    display: flex;
    @include media("<=tablet") {
      justify-content: center;
      margin-bottom: 2vw;
    }
    @include media(">tablet") {
      justify-content: flex-start;
      margin-bottom: initial;
    }
    &__item {
      position: relative;
      text-transform: uppercase;
      @include media("<=tablet") {
        margin-right: 3vw;
        font-size: 4vw;
      }
      @include media(">tablet") {
        margin-right: 0.625vw;
        font-size: 0.625vw;
      }
      &::after {
        content: '';
        position: absolute;
        right: -1.9vw;
        width: 0.25em;
        height: 100%;
        background: rgb(253,29,29);
        background: linear-gradient(90deg, rgba(253,29,29,1) 0%, rgba(250,82,244,1) 100%);
        @include media(">tablet") {
          right: -0.35vw;
        }
      }
      &:last-child {
        @include media("<=tablet") {
          &::after {
            content: none;
          }
        }
      }
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';
export default {
  computed: {
    ...mapGetters({
      allOptions: 'allOptions',
      allOptionsLoaded: 'allOptionsLoaded'
    })
  }
}
</script>
