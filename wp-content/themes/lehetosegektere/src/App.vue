<template>
  <div id="my-app" class="flex flex-col md:min-h-screen">
    <app-header />

    <transition name="loader-animation" enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
      <MenuButton :isOpened="isVisible" @click.native="toggleHeader"/>
    </transition>

    <transition name="loader-animation" enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
      <progress-bar :show-loader="showLoader" :loader-style="loaderStyle" />
    </transition>
    <transition name="page-transition" mode="out-in" appear>
      <main class="site-content mx-auto flex-1 md:px-0">
        <router-view :scrollPosition="lastScrollPosition" :windowWidth="windowWidth"></router-view>
      </main>
    </transition>

    <app-footer />
  </div>
</template>

<style lang="scss">
  @import "./assets/css/breakpoints.scss";
  .body--no-overflow {
    overflow-y: hidden;
  }
  .site-content {
    width: 100%;
    @include media("<=tablet") {
      // margin-top: 15vw;
    }
    @include media(">tablet") {
      margin-top: 3.700vw;
    }
  }
</style>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
import Header from './components/partials/Header.vue';
import Footer from './components/partials/Footer.vue';
import ProgressBar from './components/partials/ProgressBar.vue';
import MenuButton from './components/partials/Header/MenuButton';

export default {
  name: 'App',
  data() {
    return {
      showLoader: true,
      // scrollPosition: null,
      windowWidth: 0,
      windowHeight: 0,
      lastScrollPosition: 0
    };
  },
  computed: {
    ...mapGetters({
      isLoading: 'isLoading',
      loadingProgress: 'loadingProgress',
      isVisible: 'isVisible',
      isMobile: 'isMobile'
    }),

    loaderStyle() {
      return `width: ${this.loadingProgress}%;`;
    },
  },

  components: {
    appHeader: Header,
    appFooter: Footer,
    ProgressBar,
    MenuButton
  },

  methods: {
    updateScroll() {
      if (this.timeout) {
        clearTimeout(this.timeout);
      }
      this.timeout = setTimeout(() => {
        const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
        if (currentScrollPosition < 0) {
          return
        }
        if (Math.abs(currentScrollPosition - this.lastScrollPosition) < 60) {
          return
        }
        if (this.windowWidth > 768 ) {
          let showHeader = currentScrollPosition < this.lastScrollPosition;
          this.$store.dispatch('showMenu', { status: showHeader });
        }
        this.lastScrollPosition = currentScrollPosition
        // this.scrollPosition = window.scrollY;
      }, 100);
    },
    getWindowWidth (event) {
      this.windowWidth = document.documentElement.clientWidth
      this.updateView();
    },
    getWindowHeight (event) {
      this.windowHeight = document.documentElement.clientHeight
    },
    toggleHeader () {
      this.$store.dispatch('toggleMenu');
    },
    updateView () {
      if (this.windowWidth > 768) {
        this.$store.dispatch('toggleMobile', { status: false })
      } else {
        this.$store.dispatch('toggleMobile', { status: true })
      }
    }
  },

  mounted() {
    window.addEventListener('scroll', this.updateScroll);
    this.$nextTick(function () {
      window.addEventListener('resize', this.getWindowWidth);
      window.addEventListener('resize', this.getWindowHeight);
      this.getWindowWidth();
      this.getWindowHeight();
      this.updateView();
      if (this.windowWidth > 768 ) {
        this.$store.dispatch('toggleMenu');
      }
    })
  },

  beforeDestroy() {
    window.removeEventListener('scroll', this.updateScroll);
    window.removeEventListener('resize', this.getWindowWidth);
    window.removeEventListener('resize', this.getWindowHeight);
  },

  watch: {
    // watch the value of isLoading and once it's false hide the loader
    isLoading(val) {
      if (val == false) {
        let self = this;
        setTimeout(function() {
          self.showLoader = false;
        }, 1000);
      }
    },
    isVisible (val) {
      console.log(val)
      if (this.isMobile && val === true) {
        document.getElementById('body').classList.add('body--no-overflow');
      } else if (val === false) {
        document.getElementById('body').classList.remove('body--no-overflow');
      }
    }
  },
};
</script>
