<template>
  <div class="c-staff">
    <Grid rowGap="7vw">
      <div class="col-span-3 h-full" v-for="(member, index) in this.staff" :key="index">
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
    </Grid>
  </div>
</template>

<style lang="scss" scoped>
  .c-staff {
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
      margin-bottom: 0.450vw;
      font-size: 0.625vw;
      text-align: center;
      text-transform: uppercase;
    }
    &__title {
      margin-bottom: 1.500vw;
      font-size: 0.525vw;
      text-align: center;
      text-transform: uppercase;
    }
    &__description {
      padding-right: 1vw;
      font-family: 'Montserrat', sans-serif;
      font-size: 0.725vw;
    }
  }
</style>

<script>
import 'lazysizes';

import Grid from './Layout/Grid';

export default {
  props: [
    'staff'
  ],
  components: {
    Grid
  }
}
</script>