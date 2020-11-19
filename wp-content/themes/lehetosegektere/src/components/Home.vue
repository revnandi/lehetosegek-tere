<template>
  <div class="page page--home">
    <Section padding="0 3.475vw 3.475vw 3.475vw">
      <PartnerLogos/>
      <div class="grid grid-cols-12 gap-6 items-center relative">
        <ScrollIcon :isVisible="showScrollIcon"></ScrollIcon>
        <div class="col-span-6">
          <Puzzle/>
        </div>
        <div class="col-start-7 col-span-6">
          <ScrollBox height="30.4vw">
            <p>Művészeti szakemberek, társadalomkutatók, szülők, pedagógusok közösségeként, mi is, mint sokan mások, azzal a ténnyel szembesülünk, hogy az állami közoktatás rendszeréből nagyrészt hiányoznak a hagyományos tantárgyi oktatáson, a lexikális tudás számonkérésén túlmutató tanulási lehetőségek. A gyerekek és fiatalok személyiségét, gondolkodását, kreativitását fejlesztő, és a felnőtt élethez elengedhetetlen képességeket csak különórákon és iskolán kívüli képzéseken pótolhatják azok, akiknek a szülei ezt lehetővé tudják tenni. Ugyanakkor nagyon sok fiatal nem juthat hozzá ezekhez a szemléletformáló tudásokhoz, és ezáltal ahhoz a meggyőződéshez, hogy saját életét felelősen irányíthatja, megtalálhatja az érdeklődésének és képességeinek megfelelő életutat.</p>
            <p>Művészeti szakemberek, társadalomkutatók, szülők, pedagógusok közösségeként, mi is, mint sokan mások, azzal a ténnyel szembesülünk, hogy az állami közoktatás rendszeréből nagyrészt hiányoznak a hagyományos tantárgyi oktatáson, a lexikális tudás számonkérésén túlmutató tanulási lehetőségek. A gyerekek és fiatalok személyiségét, gondolkodását, kreativitását fejlesztő, és a felnőtt élethez elengedhetetlen képességeket csak különórákon és iskolán kívüli képzéseken pótolhatják azok, akiknek a szülei ezt lehetővé tudják tenni. Ugyanakkor nagyon sok fiatal nem juthat hozzá ezekhez a szemléletformáló tudásokhoz, és ezáltal ahhoz a meggyőződéshez, hogy saját életét felelősen irányíthatja, megtalálhatja az érdeklődésének és képességeinek megfelelő életutat.</p>
            <p>Művészeti szakemberek, társadalomkutatók, szülők, pedagógusok közösségeként, mi is, mint sokan mások, azzal a ténnyel szembesülünk, hogy az állami közoktatás rendszeréből nagyrészt hiányoznak a hagyományos tantárgyi oktatáson, a lexikális tudás számonkérésén túlmutató tanulási lehetőségek. A gyerekek és fiatalok személyiségét, gondolkodását, kreativitását fejlesztő, és a felnőtt élethez elengedhetetlen képességeket csak különórákon és iskolán kívüli képzéseken pótolhatják azok, akiknek a szülei ezt lehetővé tudják tenni. Ugyanakkor nagyon sok fiatal nem juthat hozzá ezekhez a szemléletformáló tudásokhoz, és ezáltal ahhoz a meggyőződéshez, hogy saját életét felelősen irányíthatja, megtalálhatja az érdeklődésének és képességeinek megfelelő életutat.</p>
          </ScrollBox>
          <Swiper></Swiper>
        </div>
      </div>
    </Section>
    <Section id="about" padding="0">
      <InfoModals/>
    </Section>
    <Section id="location" backgroundColor="purple-red">
      <Location/>
    </Section>
    <Section id="specs" backgroundColor="orange-red">
      <Perks/>
    </Section>
    <Section id="staff" backgroundColor="white">
      <Staff :staff="this.options.staff"></Staff>
    </Section>
    <!-- <recent-posts-widget limit="5" class="mb-10">Recent Posts</recent-posts-widget>
    <pages-widget limit="5">Pages</pages-widget> -->
  </div>
</template>

<script>
import axios from "axios";
import SETTINGS from "../settings";
import {debounce} from '../helpers';

import Section from './partials/Layout/Section';

import RecentPostsWidget from './widgets/RecentPosts.vue';
import PagesWidget from './widgets/Pages.vue';

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
  beforeMount() {
    this.fetchOptions();
  },
  computed: {
    showScrollIcon() {
      return this.scrollPosition < 350;
    }
  },
  methods: {
    async fetchOptions() {
      axios
        .get(
          SETTINGS.API_OPTIONS_PATH
        )
        .then(response => {
          this.options = response.data.acf;
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
};
</script>