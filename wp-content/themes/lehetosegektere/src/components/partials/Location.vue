<template>
  <div class="c-location">
    <HiddenTitle text="Hol lehet?"/>
    <Grid>
      <div class="col-span-12">
        <h2 class="c-location__title">Práter 63</h2>
      </div>
      <div class="col-span-12 md:col-span-5">
        <div class="c-location__buttons">
          <a href="#events" v-smooth-scroll>
            <Button >
              <span>Aktuális programok</span>
            </Button>
          </a>
          <router-link :to="{ name: 'Activities' }">
            <Button >
              <span>Tovább a Foglalkozásokra</span>
            </Button>
          </router-link>
          <Button>
            Térkép
          </Button>
        </div>
      </div>
      <div class="col-span-12">
        <div class="flex flex-wrap md:flex-nowrap">
          <div class="w-full md:w-1/2">
            <GradientBridge/>
          </div>
          <div class="w-full md:w-1/2">
            <ScrollBox height="23vw">
              <p>2020 őszén egy olyan teret és programot hozunk létre a 8. kerületben, ahol a motiváció, a kíváncsiság újralesztésével és a közösségben megélt értékesség élményével átfordítható a hátrányokból megélt sikertelenség tapasztalata.</p>

              <p>A LEHETŐSÉGEK TERE egy olyan diák-közösség és közösségi tér, ahol fejlesztjük a fiatalok dialógus- és vitakultúráját, kreativitását egyénileg és csoportosan is, folyamatos szakmai jelenlét mellett. Célunk, hogy a diákok megismerjék önmagukat, kibontakoztassák belső értékeiket, megélhessék saját kezdeményező-képességüket egy kooperatív és támogató közösségben.</p>

              <p>Ebben a térben iskolaidőn kívül olyan nyitott kreatív foglalkozásokon lehetnek
              együtt a diákok, amelyekhez szabadon csatlakozhatnak, és tematikájukat -
              érdeklődésüknek megfelelően - velük együtt alakítjuk ki. Emellett lehetőségük
              van egyéni és társas tanulásra, valamint kötetlenebb csoportos együttlétre és
              egyéni elvonulásra (olvasás, alkotás) is.</p>

              <p>Az iskolai tanulást kiegészítve kreativitásuk művészeti programokon,
              vitakurzusokon, filozófiai beszélgetésekben, film- és videókészítésben
              bontakozhat ki. Meglévő készségeik fejlesztése mellett személyiségük épül,
              formálódik társas kompetenciájuk és jövőképük. Célunk egy olyan közösség
              létrehozása, ahol támogatják és elfogadják egymást a fiatalok.</p>
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
  components: {
    Grid,
    GradientBridge,
    Button,
    HiddenTitle,
    ScrollBox
  }
}
</script>