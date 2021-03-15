<template>
  <div class="c-grant-item">
    <div class="c-grant-item__image-container">
      <!-- <img v-if="grant.featured_image_sizes" class="c-grant-item__image lazyload"
        width="475px"
        height="285px"
        src="https://via.placeholder.com/16x10"
        data-src="https://via.placeholder.com/475x285"
      /> -->
      <img v-if="grant.featured_image_sizes" class="c-grant-item__image lazyload"
        data-sizes="auto"
        width="475px"
        height="285px"
        :src="grant.featured_image_sizes.lqip"
        :data-srcset="`${grant.featured_image_sizes.thumbnail} 150w,
        ${grant.featured_image_sizes.medium} 300w,
        ${grant.featured_image_sizes.medium_large} 600w,
        ${grant.featured_image_sizes.large} 900w`"
        :alt="$i18n.locale === 'hu' ? grant.title.rendered : post.acf.title_en"
      />
      <div v-else class="c-grant-item__image-placeholder"></div>
    </div>
    <div class="c-grant-item__text-container">
      <div class="c-grant-item__title">{{ $i18n.locale === 'hu' ? grant.title.rendered : grant.acf.title_en }}</div>
      <div class="c-grant-item__sub">{{ $i18n.locale === 'hu' ? grant.acf.sub : grant.acf.sub_en }}</div>
      <a class="c-grant-item__link" :href="`/palyazatok/${grant.slug}`">{{ $t('buttons.continue') }}</a>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/variables.scss";
  @import "../../assets/css/breakpoints.scss";
  .c-grant-item {
    display: flex;
    flex-direction: column;
    border: 0.15vw solid #fff;
    background-color: #fff;
    @include media(">tablet") {
      height: 100%;
    }
    &__image-container {
      display: block;
      min-height: 70%;
    }
    &__image-placeholder {
      padding-top: 60%;
      background: rgb(235,107,45);
      background: -moz-linear-gradient(90deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
      background: -webkit-linear-gradient(90deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
      background: linear-gradient(90deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
    }
    &__text-container {
      display: flex;
      flex-direction: column;
      height: 100%;
      padding: 1.25vw;
    }
    &__title {
      text-transform: uppercase;
      @include media("<=tablet") {
        font-size: $text-md-mobile;
      }
      @include media(">tablet") {
        font-size: $text-xl-desktop
      }
    }
    &__sub {
      margin: 0.25vw 0 0.5vw 0;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop
      }
    }
    &__link {
      margin-top: auto;
      text-transform: uppercase;
      opacity: 1;
      transition: opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1);
      @include media("<=tablet") {
        margin-top: 2vw;
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop
      }
      &:hover {
        opacity: 0.75;
        text-decoration: underline;
      }
    }
  }
</style>

<script>
export default {
  props: {
    grant: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      
    }
  },
}
</script>