<template>
  <div class="c-info-modals">
    <HiddenTitle text="Mit lehet?"/>
    <div class="c-info-modals__inner">
      <div class="c-info-modals__controls">
        <div class="c-info-modals__face">
          <FaceChild></FaceChild>
        </div>
        <div class="c-info-modals__buttons">
          <a href="#about" v-smooth-scroll>
            <Button v-if="!showKidsModal" @click.native="toggleKidsModal">
              <span>{{ $t("info_modals.under_26") }}</span>
            </Button>
          </a>
          <CloseButton v-if="showKidsModal" @click.native="toggleKidsModal"/>
        </div>
        <div class="c-info-modals__buttons">
          <Button v-if="showKidsModal" @click.native="changekidsContent('for_who')">
            <span>{{ $t("info_modals.for_who") }}</span>
          </Button>
          <Button v-if="showKidsModal" @click.native="changekidsContent('what')">
            <span>{{ $t("info_modals.what") }}</span>
          </Button>
          <Button v-if="showKidsModal" @click.native="changekidsContent('who')">
            <span>{{ $t("info_modals.who") }}</span>
          </Button>
        </div>
        <div v-if="showAdultModal" class="c-info-modals__modal">
          <h2 class="c-info-modals__heading">{{ adultModalTitle }}</h2>
          <div class="c-info-modals__modal-content">
            <ScrollBox height="75%">
              <p>{{ adultModalContent }}</p>
            </ScrollBox>
            <router-link :to="{ name: 'Activities' }">
              <Button >
                <span>{{ $t("location.continue") }}</span>
              </Button>
            </router-link>
          </div>
        </div>
      </div>
      <div class="c-info-modals__controls">
        <div class="c-info-modals__face">
          <FaceAdult></FaceAdult>
        </div>
        <div class="c-info-modals__buttons">
          <a href="#about" v-smooth-scroll>
            <Button v-if="!showAdultModal" @click.native="toggleAdultModal">
              <span>{{ $t("info_modals.over_26") }}</span>
            </Button>
          </a>
          <CloseButton v-if="showAdultModal" @click.native="toggleAdultModal"/>
        </div>
        <div class="c-info-modals__buttons">
          <Button v-if="showAdultModal" @click.native="changeAdultContent('for_who')">
            <span>{{ $t('info_modals.for_who') }}</span>
          </Button>
          <Button v-if="showAdultModal" @click.native="changeAdultContent('what')">
            <span>{{ $t('info_modals.what') }}</span>
          </Button>
          <Button v-if="showAdultModal" @click.native="changeAdultContent('who')">
            <span>{{ $t('info_modals.who') }}</span>
          </Button>
        </div>
        <div v-if="showKidsModal" class="c-info-modals__modal">
          <h2 class="c-info-modals__heading">{{ kidsModalTitle }}</h2>
          <div class="c-info-modals__modal-content">
            <!-- <p>Szoktál unatkozni a tanórákon? Érezted már, hogy szeretnél elérni valamit, de nem tudod, hogyan is kellene? Hogy attól tartasz, nem fog sikerülni? Nálunk nem számít, milyen eredményeid vannak, honnan jössz és mi érdekel. Sokfélék vagyunk és hiszünk a sokféleség erejében, abban, hogy tudunk adni egymásnak és a tapasztalataink összeadódnak. Egy olyan közegben, ahol nincs kirekesztés és előítélet, megélheted, hogy tanulni nem csak tankönyvekből lehet!</p> -->
            <ScrollBox height="75%">
              <p>{{ kidsModalContent }}</p>
            </ScrollBox>
            <router-link :to="{ name: 'Activities' }">
              <Button >
                <span>{{ $t("location.continue") }}</span>
              </Button>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-info-modals {
    @include media("<=tablet") {
      margin-top: 10vw;
    }
    &__inner {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      // min-height: 100vh;
    }
    &__controls {
      position: relative;
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      padding: 0 3.475vw;
      @include media("<=tablet") {
        flex-wrap: wrap;
        min-height: 85vh;
      }
      @include media(">tablet") {
        min-height: 50vh;
      }
    }
    &__face {
      display: flex;
      align-items: center;
      @include media("<=tablet") {
        flex-basis: 100%;
      }
      @include media(">tablet") {
        flex-basis: 33.333%;
      }
    }
    &__buttons {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      @include media("<=tablet") {
        margin: 2.5vw 0 5vw 0;
        flex-basis: 100%;
      }
      @include media(">tablet") {
        flex-basis: 33.333%;
      }
      & > * {
        margin: 0.450vw 0;
      }
    }
    &__modal {
      position: absolute;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      width: 100%;
      height: 100%;
      padding: 3.475vw;
      background: #fff;
    }
    &__heading {
      font-size: 2.600vw;
      @include media("<=tablet") {
        display: none;
      }
    }
    &__modal-content {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      font-size: 1.300vw;
      @include media("<=tablet") {
        flex-basis: 100%;
        align-items: center;
      }
      @include media(">tablet") {
        flex-basis: 50%;
      }
      p {
        margin-bottom: 2vw;
      }
      button {
        margin-left: 1.150vw;
      }
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';
import CloseButton from './CloseButton';
import FaceAdult from './VisualElements/FaceAdult';
import FaceChild from './VisualElements/FaceChild';

import Button from './Button';
import HiddenTitle from './HiddenTitle';
import ScrollBox from './ScrollBox';

export default {
  components: {
    Button,
    CloseButton,
    FaceAdult,
    FaceChild,
    HiddenTitle,
    ScrollBox
  },
  data() {
    return {
      showKidsModal: false,
      showAdultModal: false,
      kidsModalContent: '',
      adultModalContent: '',
      kidsModalTitle: '',
      adultModalTitle: ''
    }
  },
  computed: {
    ...mapGetters({
      content: 'infoModals',
    }),
  },
  methods: {
    toggleKidsModal: function() {
      this.kidsModalTitle = this.$t('info_modals.for_who');
      this.kidsModalContent = this.$i18n.locale === 'hu' ? this.content.kids.for_who : this.content.kids.for_who_en;
      this.showKidsModal = !this.showKidsModal;
    },
    toggleAdultModal: function() {
      this.adultModalTitle = this.$t('info_modals.for_who');
      this.adultModalContent = this.$i18n.locale === 'hu' ? this.content.adult.for_who : this.content.adult.for_who_en;
      this.showAdultModal = !this.showAdultModal;
    },
    changeAdultContent(contentType) {
      if (contentType === 'what') {
        this.adultModalTitle = this.$t('info_modals.what');
        this.adultModalContent = this.$i18n.locale === 'hu' ? this.content.adult.what : this.content.adult.what_en;
      } else if (contentType === 'who'){
        this.adultModalTitle = this.$t('info_modals.who');
        this.adultModalContent = this.$i18n.locale === 'hu' ? this.content.adult.who : this.content.adult.who_en;
      } else {
        this.adultModalTitle = this.$t('info_modals.for_who');
        this.adultModalContent = this.$i18n.locale === 'hu' ? this.content.adult.for_who : this.content.adult.for_who_en;
      }
    },
    changekidsContent(contentType) {
      if (contentType === 'what') {
        this.kidsModalTitle = this.$t('info_modals.what_place');
        this.kidsModalContent = this.$i18n.locale === 'hu' ? this.content.kids.what : this.content.kids.what_en;
      } else if (contentType === 'who') {
        this.kidsModalTitle = this.$t('info_modals.who');
        this.kidsModalContent = this.$i18n.locale === 'hu' ? this.content.kids.who : this.content.kids.who_en;
      } else {
        this.kidsModalTitle = this.$t('info_modals.for_who');
        this.kidsModalContent = this.$i18n.locale === 'hu' ? this.content.kids.for_who : this.content.kids.for_who_en;
      }
    }
  },
}
</script>