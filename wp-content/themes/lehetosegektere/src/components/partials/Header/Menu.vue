<template>
  <nav class="c-main-navigation" v-if="menu">
    <ul class="c-main-navigation__list">
      <li class="c-main-navigation__item" v-for="(item, index) in this.menu.items" :key="index">
        <a :href="item.url">{{ item.title }}</a>
      </li>
    </ul>
  </nav>
</template>

<style type="postcss" scoped>
  .c-main-navigation {
    &__list {
      display: flex;
    }
    &__item {
      width: calc(100% / 7 * 1);
      text-align: center;
      font-size: 0.625vw;
      text-transform: uppercase;
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