<template>
  <div id="my-app" class="flex flex-col md:min-h-screen">
    <app-header :isVisible="showHeader"/>

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
  .site-content {
    margin-top: 3.700vw;
  }
</style>

<script>
import { mapGetters, mapActions, mapMutations } from 'vuex';
import Header from './components/partials/Header.vue';
import Footer from './components/partials/Footer.vue';
import ProgressBar from './components/partials/ProgressBar.vue';

export default {
  name: 'App',
  data() {
    return {
      showLoader: true,
      // scrollPosition: null,
      showHeader: true,
      windowWidth: 0,
      windowHeight: 0,
      lastScrollPosition: 0
    };
  },
  computed: {
    ...mapGetters({
      isLoading: 'isLoading',
      loadingProgress: 'loadingProgress',
    }),

    loaderStyle() {
      return `width: ${this.loadingProgress}%;`;
    },
  },

  components: {
    appHeader: Header,
    appFooter: Footer,
    ProgressBar,
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
        this.showHeader = currentScrollPosition < this.lastScrollPosition
        this.lastScrollPosition = currentScrollPosition
        // this.scrollPosition = window.scrollY;
      }, 100);
    },
    getWindowWidth (event) {
      this.windowWidth = document.documentElement.clientWidth
    },
    getWindowHeight (event) {
      this.windowHeight = document.documentElement.clientHeight
    },
  },

  mounted() {
    window.addEventListener('scroll', this.updateScroll);
    this.$nextTick(function () {
      window.addEventListener('resize', this.getWindowWidth);
      window.addEventListener('resize', this.getWindowHeight);
      this.getWindowWidth();
      this.getWindowHeight();
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
  },
};
</script>