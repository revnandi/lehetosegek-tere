<template>
  <div>
    <div class="c-info-modals">
      <div class="c-info-modals__inner">
        <div class="c-info-modals__controls">
          <div class="c-info-modals__face">
            <FaceChild></FaceChild>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="!showAdultModal" @click.native="toggleAdultModal">
              <span>Elmúltam 26 éves</span>
            </Button>
            <CloseButton v-if="showAdultModal" @click.native="toggleAdultModal"/>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="showAdultModal">
              <span>Kiknek szól?</span>
            </Button>
            <Button v-if="showAdultModal">
              <span>Mi ez a hely?</span>
            </Button>
            <Button v-if="showAdultModal">
              <span>Mit lehet itt csinálni?</span>
            </Button>
          </div>
          <div v-if="showKidsModal" class="c-info-modals__modal">
            <h2 class="c-info-modals__heading">Kiknek szól?</h2>
            <div class="c-info-modals__modal-content">
              <p>Szoktál unatkozni a tanórákon? Érezted már, hogy szeretnél elérni valamit, de nem tudod, hogyan is kellene? Hogy attól tartasz, nem fog sikerülni? Nálunk nem számít, milyen eredményeid vannak, honnan jössz és mi érdekel. Sokfélék vagyunk és hiszünk a sokféleség erejében, abban, hogy tudunk adni egymásnak és a tapasztalataink összeadódnak. Egy olyan közegben, ahol nincs kirekesztés és előítélet, megélheted, hogy tanulni nem csak tankönyvekből lehet!</p>
              <Button >
                <span>Tovább a Foglalkozásokra</span>
              </Button>
            </div>
          </div>
        </div>
        <div class="c-info-modals__controls">
          <div class="c-info-modals__face">
            <FaceChild></FaceChild>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="!showKidsModal" @click.native="toggleKidsModal">
              <span>Nem múltam el 26 éves</span>
            </Button>
            <CloseButton v-if="showKidsModal" @click.native="toggleKidsModal"/>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="showKidsModal">
              <span>Kiknek szól?</span>
            </Button>
            <Button v-if="showKidsModal">
              <span>Mi ez a hely?</span>
            </Button>
            <Button v-if="showKidsModal">
              <span>Mit lehet itt csinálni?</span>
            </Button>
          </div>
          <div v-if="showAdultModal" class="c-info-modals__modal">
            <h2 class="c-info-modals__heading">Kiknek szól?</h2>
            <div class="c-info-modals__modal-content">
              <p>Szoktál unatkozni a tanórákon? Érezted már, hogy szeretnél elérni valamit, de nem tudod, hogyan is kellene? Hogy attól tartasz, nem fog sikerülni? Nálunk nem számít, milyen eredményeid vannak, honnan jössz és mi érdekel. Sokfélék vagyunk és hiszünk a sokféleség erejében, abban, hogy tudunk adni egymásnak és a tapasztalataink összeadódnak. Egy olyan közegben, ahol nincs kirekesztés és előítélet, megélheted, hogy tanulni nem csak tankönyvekből lehet!</p>
              <Button >
                <span>Tovább a Foglalkozásokra</span>
              </Button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  .c-info-modals {
    &__inner {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      min-height: 100vh;
    }
    &__controls {
      position: relative;
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      min-height: 50vh;
      padding: 0 3.475vw;
    }
    &__face {
      display: flex;
      align-items: center;
      flex-basis: 33.333%;
    }
    &__buttons {
      flex-basis: 33.333%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      & > * {
        margin: 0.450vw 0;
      }
    }
    &__modal {
      position: absolute;
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
    }
    &__modal-content {
      flex-basis: 50%;
      font-size: 1.300vw;
      p {
        margin-bottom: 2vw;
      }
    }
  }
</style>

<script>
import CloseButton from './CloseButton';
import FaceChild from './VisualElements/FaceChild';

import Button from './Button';
import ScrollBox from './ScrollBox';

export default {
  components: {
    Button,
    CloseButton,
    FaceChild,
    ScrollBox
  },
  data() {
    return {
      showKidsModal: false,
      showAdultModal: false
    }
  },
  methods: {
    toggleKidsModal: function() {
      console.log('toggleKidsModal');
      this.showKidsModal = !this.showKidsModal;
    },
    toggleAdultModal: function() {
      console.log('toggleAdultModal');
      this.showAdultModal = !this.showAdultModal;
    }
  },
}
</script>