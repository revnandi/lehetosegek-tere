<template>
  <nav class="c-main-navigation" v-if="menu">
    <ul class="c-main-navigation__list">
      <li class="c-main-navigation__item" v-for="(item, index) in this.menu.items" :key="index">
        <a @click.prevent="scrollTo(item.url, $event)">{{ item.title }}</a>
      </li>
    </ul>
  </nav>
</template>

<style lang="scss" scoped>
  @import "../../../assets/css/breakpoints.scss";
  .c-main-navigation {
    &__list {
      display: flex;
      justify-content: space-evenly;
      @include media("<=tablet") {
        flex-direction: column;
      }
    }
    &__item {
      text-align: center;
      font-size: 0.8vw;
      text-transform: uppercase;
      cursor: pointer;
      @include media("<=tablet") {  
        margin-bottom: 0.85em;
        font-size: 4vw;
      }
      @include media(">tablet") {
        width: calc(100% / 5 * 1);
      }
    }
  }
</style>

<script>
export default {
  props: [
    'menu',
    'isMobile'
  ],
  methods: {
    scrollTo(anchor, event) {
      this.$store.dispatch('showMenu', { status: false });
      if(anchor && anchor.lastIndexOf('#') === 0) {
        if (anchor.lastIndexOf('/') === 0) {
          this.$router.push(anchor)
        } else if (anchor.lastIndexOf('#') === 0) {
          if (this.$route.name === 'Home') {
            const elementToScrollTo = document.getElementById(anchor.substring(1));
            this.$smoothScroll({
              scrollTo: elementToScrollTo,
            });
          } else {
            this.$router.push('/' + anchor)
            setTimeout(() => {
              const elementToScrollTo = document.getElementById(anchor.substring(1));
              this.$smoothScroll({
                scrollTo: elementToScrollTo,
              });
            }, 50);
          }
        }
      } else if (anchor && anchor === '/') {
        this.$router.push(anchor)
      } else if (anchor) {
        window.location.href = anchor
      }
    }
  },
}
</script>