<template>
  <div class="c-staff">
    <HiddenTitle text="Kikkel lehet?" />
    <Grid rowGap="7vw">
      <div class="c-staff__column h-full" v-for="(member, index) in this.staff" :key="index">
        <div class="c-staff__item">
          <div class="c-staff__image-container">
            <img class="c-staff__image lazyload"
              data-sizes="auto"
              :src="member.image.sizes.lqip"
              :data-srcset="`${member.image.sizes.thumbnail} 150w,
              ${member.image.sizes.medium} 300w,
              ${member.image.sizes.medium_large} 600w,
              ${member.image.sizes.large} 900w`"
              :alt="member.image.alt"/>
          </div>
          <h2 class="c-staff__name">{{ member.name }}</h2>
          <div class="c-staff__title">{{ member.title }}</div>
          <div class="c-staff__description">{{ member.description }}</div>
        </div>
      </div>
      <!-- <div class="col-span-12 text-center">
        <Button>
          Tovább a foglalkozásokhoz
        </Button>
      </div> -->
    </Grid>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-staff {
    &__column {
      height: 100%;
        @include media("<=tablet") {
          grid-column: span 12 / span 12;
        }
      @include media(">tablet") {
        grid-column: span 3 / span 3;
      }
    }
    &__item {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
    }
    &__image-container {
      display: inline-block;
      vertical-align: middle;
      width: 100%;
      height: 100%;
      padding: 0 3.725vw;
      margin-bottom: 4.500vw;
    }
    &__image {
      display: block;
      width: 100%;
      height: auto;
    }
    &__name {
      font-size: 0.625vw;
      text-align: center;
      text-transform: uppercase;
      @include media("<=tablet") {
        margin-bottom: 1em;
        font-size: $text-md-mobile;
      }
      @include media(">tablet") {
        font-size: $text-xl-desktop;
        margin-bottom: 0.450vw;
      }
    }
    &__title {
      font-size: 0.525vw;
      text-align: center;
      text-transform: uppercase;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
        margin-bottom: 1em;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop;
        margin-bottom: 2vw;
      }
    }
    &__description {
      padding-right: 1vw;
      font-family: 'Montserrat', sans-serif;
      font-size: 0.725vw;
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
import 'lazysizes';

import Grid from './Layout/Grid';

import HiddenTitle from './HiddenTitle';
import Button from './Button';

export default {
  props: [
    'staff'
  ],
  components: {
    Grid,
    Button,
    HiddenTitle
  }
}
</script>