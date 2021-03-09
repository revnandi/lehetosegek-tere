<template>
  <div class="c-activities-item">
    <GradientCircle v-if="!activity.acf.image"></GradientCircle>
    <div v-else class="c-activities-item__image-container">
      <img class="c-activities-item__image lazyload"
        data-sizes="auto"
        :src="activity.acf.image.sizes.lqip"
        :data-srcset="`${activity.acf.image.sizes.thumbnail} 150w,
        ${activity.acf.image.sizes.medium} 300w,
        ${activity.acf.image.sizes.medium_large} 600w,
        ${activity.acf.image.sizes.large} 900w`"
        :alt="activity.acf.image.alt"/>
    </div>
    <div class="c-activities-item__name">
      {{ $i18n.locale === 'hu' ? activity.acf.name : activity.acf.name_en }}
    </div>
    <h2 class="c-activities-item__title" v-html="$i18n.locale === 'hu' ? activity.title.rendered : activity.acf.title_en" :style="{ 'min-height' : `${minimumTitleHeight}px` }"></h2>
    <CloseButton :isRotated="true" :isDisabled="!hasLink" @click.native="handleClick"></CloseButton>
    <div class="c-activities-item__description" v-html="$i18n.locale === 'hu' ? activity.content.rendered : activity.acf.content_en"></div>
    <div></div>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-activities-item {
    display: flex;
    height: 100%;
    flex-direction: column;
    align-items: center;
    margin-bottom: 1vw;
    &__image-container {
      position: relative;
      display: block;
      width: 100%;
      height: 0;
      padding-bottom: 100%;
      border-radius: 50%;
    }
    &__image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
    }
    &__name {
      margin: 1.5vw 0 1vw 0;
      font-size: 0.525vw;
      text-transform: uppercase;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-md-desktop;
      }
    }
    &__title {
      text-align: center;
      text-transform: uppercase;
      @include media("<=tablet") {
        min-height: auto!important;
        margin-bottom: 2vw;
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        margin-bottom: 1vw;
        font-size: 1.150vw;
      }
    }
    &__description {
      margin-top: 2vw;
      font-family: 'Montserrat', sans-serif;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-longread-desktop;
      }
    }
  }
</style>

<script>
import CloseButton from './CloseButton';
import GradientCircle from './VisualElements/GradientCircle';

export default {
  props: [
    'activity',
    'windowWidth'
  ],
  components: {
    CloseButton,
    GradientCircle
  },
  data() {
    return {
      heights: [0]
    }
  },
  computed: {
    minimumTitleHeight() {
      let heightValue = Math.max(...this.heights);
      return heightValue.toString();
    },
    hasLink() {
      if(this.activity.acf.link) {
        return true;
      } else {
        return false;
      }
    }
  },
  methods: {
    setup() {
      const activityTitleElements = document.querySelectorAll('.c-activities-item__title');
      const activityTitleElementsArray = Array.from(activityTitleElements);
      this.heights = activityTitleElementsArray.map(x => x.clientHeight);
    },
    handleClick() {
      if(this.activity.acf.link) {
        window.location = this.activity.acf.link;
      } else {
        return;
      }
    }
  },
  mounted() {
    this.$nextTick(() => {
    });
    this.setup();
  },
}
</script>