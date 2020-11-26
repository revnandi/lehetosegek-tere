<template>
  <div class="c-perks">
    <div class="c-perks__circle-element-container">
      <GradientCircle/>
    </div>
    <ul class="c-perks__list">
      <li class="c-perks__item">A tanulás mint élmény</li>
      <li class="c-perks__item">Közösség és közösségi szemlélet</li>
      <li class="c-perks__item">Fiatalok aktív bevonása, egyenrangú partnerként kezelése</li>
      <li class="c-perks__item">Reflektált viszony a társadalmi és hatalmi struktúrákhoz</li>
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
  .c-perks {
    z-index: 1;
    position: relative;
    display: flex;
    align-items: stretch; 
    width: 100%;
    &__circle-element-container {
      z-index: -1;
      position: absolute;
      display: flex;
      align-items: center;
      width: 50%;
      height: 100%;
    }
    &__list {
      width: 50%;
      padding-right: 0.450vw;
    }
    @for $i from 1 through 4 {
      &__item{
        position: relative;
        padding-left: 1.200vw;
        margin-top: 1.5em;
        font-size: 2.600vw;
        color: #fff;
        &:nth-child(#{$i})::after {
          content: '0#{$i}';
          position: absolute;
          top: -3em;
          left: 0.500vw;
          display: flex;
          justify-content: center;
          align-items: center;
          width: 3.375vw;
          height: 3.375vw;
          font-size: 1.300vw;
          border-radius: 50%;
          background: rgb(235,107,45);
          background: -moz-linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
          background: -webkit-linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
          background: linear-gradient(180deg, rgba(235,107,45,1) 15%, rgba(249,16,30,1) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#eb6b2d",endColorstr="#f9101e",GradientType=1);
        }
      }
    }
    &__gallery{
      position: relative;
      max-width: 50vw;
      width: 50%;
      min-height: 100%;
      // padding-left: 0.450vw;
    }
    &__gallery .swiper-container.swiper-container-fade.swiper-container-initialized.swiper-container-horizontal {
      transform: translateY(5%);
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

export default {
  name: 'Perks',
  title: 'Perks Swiper',
  props: ['gallery'],
  components: {
    GradientCircle
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
    console.log('Current Swiper instance object', this.swiper);
  }
}
</script>