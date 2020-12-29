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
      {{ activity.acf.name }}
    </div>
    <div class="c-activities-item__title" v-html="activity.title.rendered" :style="{ 'min-height' : `${minimumTitleHeight}px` }"></div>
    <CloseButton></CloseButton>
    <div class="c-activities-item__description" v-html="activity.content.rendered"></div>
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
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: 0.725vw;
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
      console.log(heightValue)
      return heightValue.toString();
    }
  },
  methods: {
    setup() {
      const activityTitleElements = document.querySelectorAll('.c-activities-item__title');
      console.log(activityTitleElements );
      const activityTitleElementsArray = Array.from(activityTitleElements);
      this.heights = activityTitleElementsArray.map(x => x.clientHeight);
      // console.log(windowWidth)
      // console.log((this.minimumTitleHeight / this.windowWidth) * 100)
    }
  },
  mounted() {
    this.$nextTick(() => {
    });
    this.setup();
  },
}
</script>