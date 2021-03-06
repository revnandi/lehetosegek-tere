<template>
  <header :v-if="this.isLoaded === true" class="c-header" :class="{ 'c-header--visible' : isVisible }">
    <div class="c-header__inner">
      <div class="c-header__logo-container">
        <a href="/">
          <Logo></Logo>
        </a>
      </div>
      <div class="c-header__navigation-container">
        <Menu :menu="menu" :isMobile="isMobile"></Menu>
      </div>
      <div class="c-header__social-container">
        <TopSocial/>
        <LanguageSelector></LanguageSelector>
      </div>
    </div>
  </header>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  .c-header {
    $self: &;
    z-index: 2;
    position: fixed;
    width: 100%;
    padding: 0.900vw 3.475vw;
    background: #fff;
    transform: translateY(-100%);
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    @include media("<=tablet") {
      height: 100vh;
      transform: translateX(-100%);
    }
    @include media(">tablet") {
      transform: translateY(-100%);
    }
    &--visible {
      transform: translateY(0);
      @include media("<=tablet") {
        transform: translateX(0);
      }
      @include media(">tablet") {
        transform: translateY(0);
      }
    }
    &__inner {
      @include media("<=tablet") {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
      }
      @include media(">tablet") {
        display: grid;
        grid-template-columns: repeat(12, minmax(0, 1fr));
        grid-gap: 1.5rem;
        gap: 1.5rem;
        height: auto;
        align-items: center;
      }
    }
    &__logo-container {
      @include media("<=tablet") {
        position: absolute;
        top: 3.475vw;
        left: 3.475vw;
        width: 60%;
      }
      @include media(">tablet") {
        grid-column: span 3 / span 3;
        margin: auto;
        width: calc(95% - 0.5em);
      }
    }
    &__navigation-container {
      @include media("<=tablet") {
        margin-bottom: 15vw;
      }
      @include media(">tablet") {
        grid-column: span 7 / span 7;
      }
    }
    &__social-container {
      @include media("<=tablet") {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      @include media(">tablet") {
        display: flex;
        align-items: center;
        grid-column: span 2 / span 2;
      }
    }
  }
</style>

<script>
import axios from "axios";
import SETTINGS from "../../settings";
import { mapGetters } from 'vuex';

import Logo from "./VisualElements/Logo";
import Menu from "./Header/Menu";
import TopSocial from "./Header/TopSocial";
import LanguageSelector from './LanguageSelector.vue';

export default {
  name: 'Header',
  data() {
    return {
      menu: false
    }
  },

  components: {
    Logo,
    Menu,
    TopSocial,
    LanguageSelector
  },

  beforeMount() {
    this.fetchMenu();
  },

  computed: {
    ...mapGetters({
      allOptions: 'allOptions',
      allOptionsLoaded: 'allOptionsLoaded',
      isVisible: 'isVisible',
      isMobile: 'isMobile'
    }),
  },

  methods: {
    async fetchMenu() {
      axios
        .get(
          SETTINGS.API_MENUS_PATH
        )
        .then(response => {
          this.menu = response.data;
        })
        .catch(e => {
          console.log(e);
        });
    },
  },

  mounted() {
    this.$store.dispatch('getAllOptions');
  },
}
</script>
