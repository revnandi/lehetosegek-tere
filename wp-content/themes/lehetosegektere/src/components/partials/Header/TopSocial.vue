<template>
  <ul class="c-top-social">
    <ol :v-if="this.socials.facebook.visible" class="c-top-social__item">
      <a :href="this.socials.facebook.link" target="blank_">Facebook</a>
    </ol>
    <ol :v-if="this.socials.instagram.visible" class="c-top-social__item">
      <a :href="this.socials.instagram.link" target="blank_">Insta</a>
    </ol>
    <ol :v-if="this.socials.youtube.visible" class="c-top-social__item">
      <a :href="this.socials.youtube.link" target="blank_">Youtube</a>
    </ol>
  </ul>
</template>

<style lang="scss" scoped>
  .c-top-social {
    display: flex;
    &__item {
      position: relative;
      margin-right: 0.625vw;
      font-size: 0.625vw;
      text-transform: uppercase;
      &::after {
        content: '';
        position: absolute;
        right: -0.35vw;
        width: 0.2em;
        height: 100%;
        background: rgb(253,29,29);
        background: linear-gradient(90deg, rgba(253,29,29,1) 0%, rgba(250,82,244,1) 100%);
      }
    }
  }
</style>

<script>
export default {
  props:  [
    'socials'
  ]
}
</script>