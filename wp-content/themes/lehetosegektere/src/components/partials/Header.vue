<template>
  <header :v-if="this.isLoaded === true" class="c-header">
    <div :v-if="this.isLoaded === true" class="grid grid-cols-12 gap-6 items-center">
      <div class="col-span-3">
        <Logo :logo="logo"></Logo>
      </div>
      <div  class="col-span-7">
        <Menu :menu="menu"></Menu>
      </div>
      <div  class="col-span-2">
        <TopSocial :socials="socialMedia"/>
      </div>
    </div>
  </header>
</template>

<style lang="scss" scoped>
  .c-header {
    padding: 0.900vw 3.475vw 0.775vw 3.475vw;
    background: #fff;
    &__inner {
      display: flex;
      flex-direction: row;
      align-items: center;
    }
  }
</style>

<script>
import axios from "axios";
import SETTINGS from "../../settings";

import Logo from "./Header/Logo";
import Menu from "./Header/Menu";
import TopSocial from "./Header/TopSocial";

export default {
  data() {
    return {
      menu: false,
      logo: false,
      socialMedia: false
    }
  },

  components: {
    Logo,
    Menu,
    TopSocial
  },

  beforeMount() {
    this.fetchMenu();
    this.fetchOptions();
  },

  computed: {
    isLoaded: function() {
      // if (this.menu && this.logo && this.socialMedia) {
      //   return true
      // } else {
      //   return false
      // }
      return false
    }
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
    async fetchOptions() {
      axios
        .get(
          SETTINGS.API_OPTIONS_PATH
        )
        .then(response => {
          this.logo = response.data.acf.logo;
          this.socialMedia = response.data.acf.social_media;
        })
        .catch(e => {
          console.log(e);
        });
    },
  }
}
</script>
