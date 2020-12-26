<template>
  <nav class="c-main-navigation" v-if="menu">
    <ul class="c-main-navigation__list">
      <li class="c-main-navigation__item" v-for="(item, index) in this.menu.items" :key="index">
        <a :href="item.url" v-smooth-scroll>{{ item.title }}</a>
      </li>
    </ul>
  </nav>
</template>

<style lang="scss" scoped>
  @import "../../../assets/css/breakpoints.scss";
  .c-main-navigation {
    &__list {
      display: flex;
      @include media("<=tablet") {
        flex-direction: column;
      }
    }
    &__item {
      text-align: center;
      font-size: 0.625vw;
      text-transform: uppercase;
      @include media("<=tablet") {
        margin-bottom: 0.85em;
        font-size: 4vw;
      }
      @include media(">tablet") {
        width: calc(100% / 7 * 1);
      }
    }
  }
</style>

<script>
export default {
  props: [
    'menu'
  ]
}
</script>