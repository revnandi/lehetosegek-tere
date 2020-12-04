<template>
  <div>
    <div class="c-info-modals">
      <div class="c-info-modals__inner">
        <div class="c-info-modals__controls">
          <div class="c-info-modals__face">
            <FaceChild></FaceChild>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="!showKidsModal" @click.native="toggleKidsModal">
              <span>Nem múltam 26 éves</span>
            </Button>
            <CloseButton v-if="showKidsModal" @click.native="toggleKidsModal"/>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="showKidsModal" @click.native="changekidsContent('for_who')">
              <span>Kiknek szól?</span>
            </Button>
            <Button v-if="showKidsModal" @click.native="changekidsContent('what')">
              <span>Mi ez a hely?</span>
            </Button>
            <Button v-if="showKidsModal" @click.native="changekidsContent('who')">
              <span>Mit lehet itt csinálni?</span>
            </Button>
          </div>
          <div v-if="showAdultModal" class="c-info-modals__modal">
            <h2 class="c-info-modals__heading">{{ adultModalTitle }}</h2>
            <div class="c-info-modals__modal-content">
              <ScrollBox height="75%">
                <p>{{ adultModalContent }}</p>
              </ScrollBox>
              <Button >
                <span>Tovább a Foglalkozásokra</span>
              </Button>
            </div>
          </div>
        </div>
        <div class="c-info-modals__controls">
          <div class="c-info-modals__face">
            <FaceAdult></FaceAdult>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="!showAdultModal" @click.native="toggleAdultModal">
              <span>Elmúltam el 26 éves</span>
            </Button>
            <CloseButton v-if="showAdultModal" @click.native="toggleAdultModal"/>
          </div>
          <div class="c-info-modals__buttons">
            <Button v-if="showAdultModal" @click.native="changeAdultContent('for_who')">
              <span>Kiknek szól?</span>
            </Button>
            <Button v-if="showAdultModal" @click.native="changeAdultContent('what')">
              <span>Mi ez a hely?</span>
            </Button>
            <Button v-if="showAdultModal" @click.native="changeAdultContent('who')">
              <span>Mit lehet itt csinálni?</span>
            </Button>
          </div>
          <div v-if="showKidsModal" class="c-info-modals__modal">
            <h2 class="c-info-modals__heading">{{ kidsModalTitle }}</h2>
            <div class="c-info-modals__modal-content">
              <!-- <p>Szoktál unatkozni a tanórákon? Érezted már, hogy szeretnél elérni valamit, de nem tudod, hogyan is kellene? Hogy attól tartasz, nem fog sikerülni? Nálunk nem számít, milyen eredményeid vannak, honnan jössz és mi érdekel. Sokfélék vagyunk és hiszünk a sokféleség erejében, abban, hogy tudunk adni egymásnak és a tapasztalataink összeadódnak. Egy olyan közegben, ahol nincs kirekesztés és előítélet, megélheted, hogy tanulni nem csak tankönyvekből lehet!</p> -->
              <ScrollBox height="75%">
                <p>{{ kidsModalContent }}</p>
              </ScrollBox>
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
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      flex-basis: 50%;
      font-size: 1.300vw;
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
import CloseButton from './CloseButton';
import FaceAdult from './VisualElements/FaceAdult';
import FaceChild from './VisualElements/FaceChild';

import Button from './Button';
import ScrollBox from './ScrollBox';

const content = {
  for_who: {
    title: 'Kinek szól?',
    adult: 'Olyan fiataloknak szól, akiket az oktatási rendszerben megélt sikertelenségekből és a motiválatlanságból eredő hátrányok az élet számos területén korlátoznak. Sok fiatalnak van tapasztalata a kirekesztéssel, szociális problémákkal, iskolai előítéletekkel, kudarcokkal - számukra a tanulás már negatív tartalommal rendelkezik. Programunk nyitott azoknak a középiskolásoknak és fiatal felnőtteknek, akik jobb háttérrel rendelkező társaikkal ellentétben nem kapják meg a felnőtté váláshoz és teljesebb élethez szükséges társadalmi és kulturális tőkét.',
    kids: 'Szoktál unatkozni a tanórákon? Érezted már, hogy szeretnél elérni valamit, de nem tudod, hogyan is kellene? Hogy attól tartasz, nem fog sikerülni? Nálunk nem számít, milyen eredményeid vannak, honnan jössz és mi érdekel. Sokfélék vagyunk és hiszünk a sokféleség erejében, abban, hogy tudunk adni egymásnak és a tapasztalataink összeadódnak. Egy olyan közegben, ahol nincs kirekesztés és előítélet, megélheted, hogy tanulni nem csak tankönyvekből lehet!'
  },
  what: {
    title: 'Mi ez a hely?',
    adult: 'A LEHETŐSÉGEK TERE egy közösségépítő hely, ahol művészeti és demokratikus pedagógiai módszereken alapuló foglalkozásokat tartunk integratív szemlélettel. A foglalkozások során a fiatalok megtapasztalhatják  a közösség építő erejét, részt vehetnek egy olyan tér formálásában, amelynek alapjait számukra, ám az ő bevonásukkal művészek, tanárok, és a kultúra egyéb területén tevékenykedő elkötelezett, felnőtt társaik teremtik meg. Ennek során felelős, a társadalmi ügyek iránt érzékeny és elhivatott fiatalokból álló, demokratikus alapokon működő közösséget építünk, amely a tagok egymás kölcsönös tiszteletén alapszik. Nyitott, befogadó, szabad közeg: korábban fel nem ismert lehetőségek tere.',
    kids: 'A LEHETŐSÉGEK TERE egy olyan hely, ahol fontos, hogy az lehess, aki vagy, ahol jól érezheted magad, semmi sem kötelező, észreveheted azt, ami érdekel és olyan utat találhatsz, amilyet igazán szeretnél magadnak. Itt megélheted, hogy a tanulás élmény is lehet, és nem kell tartanod attól, hogy hibázol. Ebben a közösségben együtt lazulunk és együtt keressük azokat az élményeket, amelyekből megtanuljuk, hogyan igazodjunk ki a világ dolgain, magunkon és egymáson. Szeretnénk teret adni olyan maradandó és hasznos tapasztalatoknak, amelyek segítenek abban, hogy jó döntéseket hozz és könnyebben tudj együttműködni másokkal.'
  },
  who: {
    title: 'Mit lehet itt csinálni?',
    kids: 'A különböző délutáni foglalkozásokon lehetsz szókimondó, kritikus vagy akár hallgatag. Kipróbálhatod magad közösségben egy vitakurzuson, egy filozófiai beszélgetésben vagy lustálkodás óráinkon, gondolkodhatsz filmeken, és gyakorlati tudást szerezhetsz művészeti és videós programjainkon.',
    adult: 'A különböző délutáni foglalkozásokon lehetsz szókimondó, kritikus vagy akár hallgatag. Kipróbálhatod magad közösségben egy vitakurzuson, egy filozófiai beszélgetésben vagy lustálkodás óráinkon, gondolkodhatsz filmeken, és gyakorlati tudást szerezhetsz művészeti és videós programjainkon.'
  }
};

export default {
  components: {
    Button,
    CloseButton,
    FaceAdult,
    FaceChild,
    ScrollBox
  },
  data() {
    return {
      showKidsModal: false,
      showAdultModal: false,
      kidsModalContent: content.for_who.kids,
      adultModalContent: content.for_who.adult,
      kidsModalTitle: content.for_who.title,
      adultModalTitle: content.for_who.title
    }
  },
  methods: {
    toggleKidsModal: function() {
      this.showKidsModal = !this.showKidsModal;
    },
    toggleAdultModal: function() {
      this.showAdultModal = !this.showAdultModal;
    },
    changeAdultContent(contentType) {
      if (contentType === 'what') {
        this.adultModalTitle = content.what.title;
        this.adultModalContent = content.what.adult;
      } else if (contentType === 'who'){
        this.adultModalTitle = content.who.title;
        this.adultModalContent = content.who.adult;
      } else {
        this.adultModalTitle = content.for_who.title;
        this.adultModalContent = content.for_who.adult;
      }
    },
    changekidsContent(contentType) {
      if (contentType === 'what') {
        this.kidsModalTitle = content.what.title;
        this.kidsModalContent = content.what.kids;
      } else if (contentType === 'who') {
        this.kidsModalTitle = content.who.title;
        this.kidsModalContent = content.who.kids;
      } else {
        this.kidsModalTitle = content.for_who.title;
        this.kidsModalContent = content.for_who.kids;
      }
    }
  },
}
</script>