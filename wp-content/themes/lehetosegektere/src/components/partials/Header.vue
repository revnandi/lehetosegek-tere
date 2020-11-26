<template>
  <header :v-if="this.isLoaded === true" class="c-header" :class="{ 'c-header--visible' : isVisible}">
    <div :v-if="this.isLoaded === true" class="grid grid-cols-12 gap-6 items-center">
      <div class="col-span-3">
        <div class="c-header__logo-container">
          <a href="/">
            <Logo></Logo>
          </a>
        </div>
      </div>
      <div  class="col-span-7">
        <Menu :menu="menu"></Menu>
      </div>
      <div  class="col-span-2">
        <TopSocial :socials="allOptions.social_media"/>
      </div>
    </div>
  </header>
</template>

<style lang="scss" scoped>
  .c-header {
    z-index: 2;
    position: fixed;
    width: 100%;
    padding: 0.900vw 3.475vw;
    background: #fff;
    transform: translateY(-100%);
    transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    &--visible {
      transform: translateY(0);
    }
    &__inner {
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    &__logo-container {
      width: calc(66.666% - 0.5em);
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

export default {
  name: 'Header',
  props: [
    'isVisible'
  ],
  data() {
    return {
      menu: false
    }
  },

  components: {
    Logo,
    Menu,
    TopSocial
  },

  beforeMount() {
    this.fetchMenu();
  },

  computed: {
    ...mapGetters({
      allOptions: 'allOptions',
      allOptionsLoaded: 'allOptionsLoaded',
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
