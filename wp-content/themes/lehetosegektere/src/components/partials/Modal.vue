<template>
  <div class="c-modal">
    <div class="c-modal__inner">
      <div class="c-modal__close-button" @click="handleClick">
        <div class="c-modal__close-button-inner">
          <span class="c-modal__close-button-line"></span>
          <span class="c-modal__close-button-line"></span>
        </div>
      </div>
      <div class="c-modal__content">
        <div id="pdf_container" class="c-modal__pdf-container"></div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba($color: #000, $alpha: 0.5);
    z-index: 9999;
    &__inner {
      position: relative;
      width: 100%;
      height: 100%;
    }
    &__content {
      position: absolute;
      @include media("<=tablet") {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
      }
      @include media(">tablet") {
        top: 5vw;
        left: 10vw;
        width: calc(100% - 20vw);
        height: calc(100% - 10vw);
      }
    }
    &__pdf-container {
      width: 100%;
      height: 100%;
      @include media("<=tablet") {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5vw;
        background: #fff;
      }
      & a {
        display: block;
        margin-top: 1em;
        color: #ff00fd;
        text-align: center;
      }
    }
    &__close-button {
      position: absolute;
      display: inline-block;
      margin: 0.5vw;
      font-size: 6vw;
      cursor: pointer;
      line-height: 1;
      border-radius: 8px;
      z-index: 3;
      @include media("<=tablet") {
        top: 2.5vw;
        right: 2.5vw;
      }
      @include media(">tablet") {
        top: 0;
        right: 0;
      }
    }
    &__close-button-inner {
      position: relative;
      @include media("<=tablet") {
        width: 6vw;
        height: 6vw;
      }
      @include media(">tablet") {
        width: 4vw;
        height: 4vw;
      }
    }
    &__close-button-line {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 0.5vw;
      background-color: #fff;
      -webkit-transition: top 0.2s ease-in-out 0.4s, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out, -webkit-transform 0.4s ease-in-out;
      transition: top 0.2s ease-in-out 0.4s, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out, -webkit-transform 0.4s ease-in-out;
      -o-transition: top 0.2s ease-in-out 0.4s, transform 0.4s ease-in-out, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out;
      transition: top 0.2s ease-in-out 0.4s, transform 0.4s ease-in-out, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out;
      transition: top 0.2s ease-in-out 0.4s, transform 0.4s ease-in-out, opacity 0.2s ease-in-out 0.2s, left 0.2s ease-in-out, -webkit-transform 0.4s ease-in-out;
      @include media("<=tablet") {
        background-color: #000;
      }
      &:nth-child(1) {
        top: 50%;
        transform: translateY(-50%) rotate(45deg);
        -webkit-transform: translateY(-50%) rotate(45deg);
        -ms-transform: translateY(-50%) rotate(45deg);
      }
      &:nth-child(2) {
        top: 50%;
        transform: translateY(-50%) rotate(-45deg);
        -webkit-transform: translateY(-50%) rotate(-45deg);
        -ms-transform: translateY(-50%) rotate(-45deg);
      }
    }
  }
</style>

<script>
import PDFObject from 'pdfobject';

export default {
  props: {
    url: {
      type: String,
      default: ''
    }
  },
  methods: {
    initPdf () {
      const pdfOptions = {
        fallbackLink: "<p>A böngésződ nem támogatja a PDF megjelenítését. <a href='[url]'>PDF letöltése</a></p>"
      };
      PDFObject.embed(this.url, "#pdf_container", pdfOptions);
    },
    handleClick() {
      this.$store.dispatch('toggleModal');
    }
  },
  mounted() {
    this.initPdf();
  },
}
</script>