<template>
  <div class="c-location">
    <HiddenTitle text="Hol lehet?"/>
    <Grid>
      <div class="col-span-12">
        <h2 class="c-location__title">Práter 63</h2>
      </div>
      <div class="col-span-12 md:col-span-6">
        <div class="c-location__buttons">
          <a @click.prevent="scrollTo('#events', $event)">
            <Button >
              <span>{{ $t("location.current") }}</span>
            </Button>
          </a>
          <router-link :to="{ name: 'Activities' }">
            <Button >
              <span>{{ $t("location.continue") }}</span>
            </Button>
          </router-link>
          <a href="https://goo.gl/maps/AAYFfoX4biRQ28mH7" target="_blank" rel="noopener">
            <Button>{{ $t("location.map") }}</Button>
          </a>
        </div>
      </div>
      <div class="col-span-12">
        <div class="flex flex-wrap md:flex-nowrap">
          <div class="w-full md:w-1/2">
            <GradientBridge/>
          </div>
          <div class="w-full md:w-1/2">
            <TextBox :url="allOptions.location_box_link" class="c-textbox--location" height="100%">
              <div v-html="text"></div>
            </TextBox>
          </div>
        </div>
      </div>
    </Grid>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-location {
    &__title {
      font-size: 11.6vw;
      color: #fff;
      text-transform: uppercase;
    }
    &__buttons {
      display: flex;
      justify-content: space-evenly;
      margin-bottom: 1.875vw;
      @include media("<=tablet") {
        flex-direction: column;
        align-items: center;
      }
      & > *:first-child {
        @include media("<=tablet") {
          margin-bottom: 5vw;
        }
        @include media(">tablet") {
        }
      }
      & > *:nth-child(2) {
        @include media("<=tablet") {
          margin-bottom: 5vw;
        }
        @include media(">tablet") {
        }
      }
      & > *:last-child {
        @include media("<=tablet") {
          margin-bottom: 5vw;
        }
        @include media(">tablet") {
        }
      }
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';

import Grid from './Layout/Grid';

import GradientBridge from './VisualElements/GradientBridge';

import Button from './Button';
import HiddenTitle from './HiddenTitle';
import TextBox from './TextBox';

export default {
  props: ['text'],
  components: {
    Grid,
    GradientBridge,
    Button,
    HiddenTitle,
    TextBox
  },
  methods: {
    scrollTo(anchor, event) {
      this.$store.dispatch('showMenu', { status: false });
      if (anchor && anchor === '#events') {
        const elementToScrollTo = document.getElementById(anchor.substring(1));
        this.$smoothScroll({
          scrollTo: elementToScrollTo,
          offset: -200
        });
      } else if(anchor && anchor.lastIndexOf('#') === 0) {
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
      }
    }
  },
  computed: {
    ...mapGetters({
      allOptions: 'allOptions',
      allOptionsLoaded: 'allOptionsLoaded',
    }),
  }
}
</script>