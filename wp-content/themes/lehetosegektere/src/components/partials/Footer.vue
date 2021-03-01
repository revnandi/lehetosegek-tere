<template>
  <footer class="c-footer">
    <Section>
      <HiddenTitle text="Kövessetek bennünket!"/>
      <div class="c-footer__inner">
        <a href="/partnerek">
          <Button>Partnerek</Button>
        </a>
        <div class="c-footer__social">
          <div class="c-footer__social-title">Kövessetek bennünket!</div>
          <div class="c-footer__heart-container">
            <GradientHeart/>
            <template v-if="allOptionsLoaded">
              <a v-if="allOptions.social_media.facebook.link" class="c-footer__social-link c-footer__social-link--top" :href="allOptions.social_media.facebook.link" target="blank_">facebook</a>
              <a v-if="allOptions.social_media.instagram.link" class="c-footer__social-link c-footer__social-link--bottom" :href="allOptions.social_media.instagram.link" target="blank_">insta</a>
            </template>
          </div>
        </div>
        <a :href="allOptions.newsletter_url">
          <Button>{{ allOptions.newsletter_label }}</Button>
        </a>
      </div>
    </Section>
  </footer>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-footer {
    display: block;
    &__inner {
      display: flex;
      align-items: center;
      justify-content: center;
      @include media("<=tablet") {
        flex-direction: column;
      }
    }
    &__social {
      display: flex;
      flex-direction: column;
      justify-content: center;
      @include media("<=tablet") {
        margin: 3.0625vw 6.125vw;
      }
      @include media(">tablet") {
        margin: 0 6.125vw;
      }
    }
    &__social-title {
      text-transform: uppercase;
      margin-bottom: 1.200vw;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop;
      }
    }
    &__heart-container {
      position: relative;
      display: flex;
      justify-content: center;
    }
    &__social-link {
      position: absolute;
      display: inline-block;
      @include media("<=tablet") {
        font-size: 10vw;
      }
      @include media(">tablet") {
        font-size: $text-xxl-desktop;
      }
      &--top {
        top: 10%;
      }
      &--bottom {
        top: 45%;
      }
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';

import GradientHeart from "./VisualElements/GradientHeart";
import Section from './Layout/Section';

import Button from './Button';
import HiddenTitle from './HiddenTitle';

export default {
  name: 'Footer',
  components: {
    Section,
    Button,
    HiddenTitle,
    GradientHeart
  },

  computed: {
    ...mapGetters({
      allOptions: 'allOptions',
      allOptionsLoaded: 'allOptionsLoaded',
    }),
  },

  mounted() {
    this.$store.dispatch('getAllOptions');
  },
}
</script>
