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
    <div class="c-perks__image-container">
      <img class="c-perks__image" src="https://picsum.photos/800/800" alt="">
    </div>
  </div>
</template>

<style lang="scss" scoped>
  .c-perks {
    z-index: 1;
    position: relative;
    display: flex;
    align-items: center;
    &__circle-element-container {
      z-index: -1;
      position: absolute;
      display: flex;
      align-items: center;
      width: 50%;
      height: 100%;
    }
    &__list {
      flex-basis: 50%;
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
    &__image-container {
      flex-basis: 50%;
      padding-left: 0.450vw;
    }
    &__image {
      width: 100%;
      border-radius: 50%;
    }
  }
</style>

<script>
import GradientCircle from './VisualElements/GradientCircle';

export default {
  components: {
    GradientCircle
  }
}
</script>