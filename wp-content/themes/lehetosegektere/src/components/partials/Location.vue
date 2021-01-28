<template>
  <div class="c-location">
    <HiddenTitle text="Hol lehet?"/>
    <Grid>
      <div class="col-span-12">
        <h2 class="c-location__title">Práter 63</h2>
      </div>
      <div class="col-span-12 md:col-span-5">
        <div class="c-location__buttons">
          <a @click.prevent="scrollTo('#events', $event)">
            <Button >
              <span>Aktuális programok</span>
            </Button>
          </a>
          <router-link :to="{ name: 'Activities' }">
            <Button >
              <span>Tovább a Foglalkozásokra</span>
            </Button>
          </router-link>
          <a href="https://goo.gl/maps/AAYFfoX4biRQ28mH7" target="_blank">
            <Button>
              Térkép
            </Button>
          </a>
        </div>
      </div>
      <div class="col-span-12">
        <div class="flex flex-wrap md:flex-nowrap">
          <div class="w-full md:w-1/2">
            <GradientBridge/>
          </div>
          <div class="w-full md:w-1/2">
            <ScrollBox height="23vw">
              <div v-html="text"></div>
            </ScrollBox>
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
          width: 14.125vw;
        }
      }
      & > *:nth-child(2) {
        @include media("<=tablet") {
          margin-bottom: 5vw;
        }
        @include media(">tablet") {
          width: 14.125vw;
        }
      }
      & > *:last-child {
        @include media("<=tablet") {
          margin-bottom: 5vw;
        }
        @include media(">tablet") {
          width: 6.325vw;
        }
      }
    }
  }
</style>

<script>
import Grid from './Layout/Grid';

import GradientBridge from './VisualElements/GradientBridge';

import Button from './Button';
import HiddenTitle from './HiddenTitle';
import ScrollBox from './ScrollBox';

export default {
  props: ['text'],
  components: {
    Grid,
    GradientBridge,
    Button,
    HiddenTitle,
    ScrollBox
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
}
</script>