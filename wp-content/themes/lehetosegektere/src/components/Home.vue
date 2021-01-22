<template>
  <div class="page">
    <Section padding="0 3.475vw 3.475vw 3.475vw">
      <PartnerLogos/>
      <div class="grid grid-cols-12 gap-6 items-center relative">
        <div class="col-span-12 md:col-span-6 h-full">
          <Puzzle/>
        </div>
        <div class="col-span-12 md:col-start-7 md:col-span-6 h-full">
          <ScrollBox class="c-scroll-box--hero">
            <p>Művészeti szakemberek, társadalomkutatók, szülők, pedagógusok közösségeként, mi is, mint sokan mások, azzal a ténnyel szembesülünk, hogy az állami közoktatás rendszeréből nagyrészt hiányoznak a hagyományos tantárgyi oktatáson, a lexikális tudás számonkérésén túlmutató tanulási lehetőségek. A gyerekek és fiatalok személyiségét, gondolkodását, kreativitását fejlesztő, és a felnőtt élethez elengedhetetlen képességeket csak különórákon és iskolán kívüli képzéseken pótolhatják azok, akiknek a szülei ezt lehetővé tudják tenni. Ugyanakkor nagyon sok fiatal nem juthat hozzá ezekhez a szemléletformáló tudásokhoz, és ezáltal ahhoz a meggyőződéshez, hogy saját életét felelősen irányíthatja, megtalálhatja az érdeklődésének és képességeinek megfelelő életutat.</p>
            <p>Ezek a hiányok és tapasztalatok hívták életre első találkozásunkat, az a vízió, hogy e tudásokat azok számára is elérhetővé tehetjük, akik más-más okokból nem férhetnek hozzá. A tenni akarás közös motorja mellett egymást és egymás módszereit is megismertük. Az elmúlt egy év során foglalkozások keretében próbáltuk ki a különböző munkamódszereket, megéltük az együtt gondolkodás dinamikáit, a közös célok kialakítását, kutatásokat folytattunk és kerestük a tudásmegosztás, a kapcsolódás formáit, miközben valódi közösséggé váltunk.</p>
            <p>Felelősséget érzünk a fiatal generáció tagjai iránt, hiszen ha fiatalok nem látnak jövőt maguk előtt, hogyan válhatnak saját véleménnyel rendelkező, a szűkebb és tágabb környezetükért felelős, cselekvő felnőttekké? Ezért döntöttünk úgy, hogy elindítjuk a LEHETŐSÉGEK TERÉT, egy olyan helyet, ahol a tanulásról és a közösségről is új élményeket lehet szerezni, és amelyet a fiatalokkal organikus folyamat során közösen formálunk.</p>
          </ScrollBox>
          <Swiper></Swiper>
        </div>
      </div>
    </Section>
    <Section padding="0">
      <EventList id="events" :limit="5"></EventList>
    </Section>
    <Section id="about" padding="0">
      <InfoModals/>
    </Section>
    <Section id="location" backgroundColor="purple-red">
      <Location/>
    </Section>
    <Section id="perks" backgroundColor="orange-red">
      <Perks :gallery="allOptions.gallery"/>
    </Section>
    <Section id="staff" backgroundColor="white">
      <Staff :staff="allOptions.staff"/>
    </Section>
    <!-- <recent-posts-widget limit="5" class="mb-10">Recent Posts</recent-posts-widget>
    <pages-widget limit="5">Pages</pages-widget> -->
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
import { mapGetters } from 'vuex';
import axios from "axios";
import SETTINGS from "../settings";
import {debounce} from '../helpers';

import Section from './partials/Layout/Section';

import RecentPostsWidget from './widgets/RecentPosts.vue';
import PagesWidget from './widgets/Pages.vue';

import EventList from './partials/EventList';
import InfoModals from './partials/InfoModals';
import Location from './partials/Location';
import PartnerLogos from './partials/PartnerLogos';
import Perks from './partials/Perks';
import Puzzle from './partials/Puzzle';
import ScrollBox from './partials/ScrollBox';
import ScrollIcon from './partials/ScrollIcon';
import Staff from './partials/Staff';
import Swiper from './partials/Swiper';

export default {
  name: 'Home',
  props: [
    'scrollPosition'
  ],
  components: {
    EventList,
    InfoModals,
    Location,
    Section,
    RecentPostsWidget,
    PagesWidget,
    PartnerLogos,
    Perks,
    Puzzle,
    ScrollBox,
    ScrollIcon,
    Staff,
    Swiper
  },
  data() {
    return {
      options: false
    }
  },
  mounted() {
    this.$store.dispatch('getAllOptions');
  },
  computed: {
    ...mapGetters({
      allOptions: 'allOptions',
      allOptionsLoaded: 'allOptionsLoaded',
    }),
    showScrollIcon() {
      return this.scrollPosition < 350;
    }
  }
};
</script>