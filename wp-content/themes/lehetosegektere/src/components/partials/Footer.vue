<template>
  <footer class="c-footer">
    <Section>
      <div class="c-footer__inner">
        <Button>Események</Button>
        <div class="c-footer__social">
          <div class="c-footer__social-title">Kövessetek bennünket!</div>
          <div class="c-footer__heart-container">
            <GradientHeart/>
            <a class="c-footer__social-link c-footer__social-link--top" href="#" target="blank_">facebook</a>
            <a class="c-footer__social-link c-footer__social-link--bottom" href="#" target="blank_">insta</a>
          </div>
        </div>
        <Button>Hírlevél</Button>
      </div>
    </Section>
  </footer>
</template>

<style lang="scss" scoped>
  .c-footer {
    display: block;
    &__inner {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    &__social {
      display: flex;
      flex-direction: column;
      justify-content: center;
      margin: 0 6.125vw;
    }
    &__social-title {
      font-size: 0.625vw;
      text-transform: uppercase;
      margin-bottom: 1.200vw;
    }
    &__heart-container {
      position: relative;
      display: flex;
      justify-content: center;
    }
    &__social-link {
      position: absolute;
      display: inline-block;
      font-size: 2.600vw;
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
import GradientHeart from "./VisualElements/GradientHeart";
import Section from './Layout/Section';

import Button from './Button';

export default {
  components: {
    Section,
    Button,
    GradientHeart
  }
}
</script>
