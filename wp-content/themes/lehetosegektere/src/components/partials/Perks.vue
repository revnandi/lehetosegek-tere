<template>
  <div class="c-perks">
    <div class="c-perks__circle-element-container">
      <GradientCircle/>
    </div>
    <ul class="c-perks__list">
      <li class="c-perks__item c-perks__item--title">
        <h1>Alapelveink</h1>
      </li>
      <template v-if="principles">
        <li v-for="(item, index) in principles" :key="index" class="c-perks__item">
          {{ item.text }}
        </li>
        <li v-if="link" class="c-perks__item c-perks__item--link">
          <a :href="link">
            <Button>
              Bővebben
            </Button>
          </a>
        </li>
      </template>
    </ul>
    <div class="c-perks__gallery">
      <swiper ref="perksSwiper" :options="swiperOptions">
        <!-- <swiper-slide v-for="item in gallery" :key="item.id">
          <div class="c-perks__gallery-inner">
            <img class="c-perks__gallery-image lazyload"
              data-sizes="auto"
              :src="item.sizes.lqip"
              :data-srcset="`${item.sizes.thumbnail} 150w,
              ${item.sizes.medium} 300w,
              ${item.sizes.medium_large} 600w,
              ${item.sizes.large} 900w`"
              alt=""
            />
          </div>
        </swiper-slide> -->
        <!-- <swiper-slide :v-if="gallery" v-for="item in gallery" :key="item.id">
        </swiper-slide> -->
        <swiper-slide v-for="(item, index) in gallery" :key="index">
        <!-- <div>{{item}}</div> -->
          <div class="c-perks__gallery-inner">
            <img class="c-perks__gallery-image lazyload"
              data-sizes="auto"
              :src="item.sizes.lqip"
              :data-srcset="`${item.sizes.thumbnail} 150w,
              ${item.sizes.medium} 300w,
              ${item.sizes.medium_large} 600w,
              ${item.sizes.large} 900w
              ${item.extra_large} 1200w`"
              alt=""
            />
          </div>
        </swiper-slide>
      </swiper>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-perks {
    z-index: 1;
    position: relative;
    display: flex;
    align-items: stretch; 
    width: 100%;
    @include media("<=tablet") {
      flex-direction: column;
    }
    &__circle-element-container {
      z-index: -1;
      position: absolute;
      display: flex;
      width: 50%;
      height: 100%;
      @include media("<=tablet") {
        width: 100%;
        height: auto;
      }
      @include media(">tablet") {
        align-items: center;
      }
    }
    &__list {
      width: 50%;
      padding-right: 0.450vw;
      @include media("<=tablet") {
        width: 100%;
        margin-bottom: 25vw;
      }
    }
    @for $i from 1 through 6 {
      &__item{
        position: relative;
        padding-left: 1.200vw;
        margin-top: 1.5em;
        font-size: 2.600vw;
        color: #fff;
        @include media("<=tablet") {
          font-size: $text-base-mobile;
        }
        @include media(">tablet") {
          font-size: $text-xxl-desktop;
        }
        &:nth-child(#{$i})::after {
          content: '0#{$i - 1}';
          position: absolute;
          left: 0.500vw;
          display: flex;
          justify-content: center;
          align-items: center;
          border-radius: 50%;
          background: rgb(235,107,45);
          background: -moz-linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
          background: -webkit-linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
          background: linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
          @include media("<=tablet") {
            top: -2.25em;
            width: 5.375vw;
            height: 5.375vw;
            font-size: 2.5vw;
          }
          @include media(">tablet") {
            top: -3em;
            width: 3.375vw;
            height: 3.375vw;
            font-size: 1.300vw;
          }
        }
        &--title {
          display: inline-block;
          margin: 0 0 1em 0;
          text-transform: uppercase;
          &::after {
            content: none!important;
          }
          & h1 {
            margin: 0;
          }
        }
        &--link {
          margin: 1em 0 0 0;
          &::after {
            content: none!important;
          }
        }
      }
    }
    &__gallery{
      position: relative;
      min-height: 100%;
      @include media("<=tablet") {
        max-width: calc(100vw - (3.475vw * 2));
        width: 100%;
      }
      @include media(">tablet") {
        max-width: 50vw;
        width: 50%;
      }
    }
    &__gallery .swiper-container.swiper-container-fade.swiper-container-initialized.swiper-container-horizontal {
      @include media(">tablet") {
        top: 50%;
        transform: translateY(-50%);
      }
    }
    &__gallery-inner {
      width: 100%;
      height: 0;
      padding-bottom: 100%;
      position: relative;
    }
    &__gallery-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
    }
  }
</style>

<script>
import GradientCircle from './VisualElements/GradientCircle';

import Button from './Button';

export default {
  name: 'Perks',
  title: 'Perks Swiper',
  props: ['gallery', 'principles', 'link'],
  components: {
    GradientCircle,
    Button
  },
  data() {
    return {
      swiperOptions: {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 400,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false
        }
      }
    }
  },
  computed: {
    swiper() {
      return this.$refs.perksSwiper.$swiper;
    },
  },

  mounted() {
    // console.log('Current Swiper instance object', this.swiper);
  }
}
</script>