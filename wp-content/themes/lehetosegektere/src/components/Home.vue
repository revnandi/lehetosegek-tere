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
            <div v-html="allOptions.hero_box"></div>
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
      <Location :text="allOptions.location_box"/>
    </Section>
    <Section id="perks" backgroundColor="orange-red">
      <Perks :gallery="allOptions.gallery" :principles="allOptions.principles" :link="allOptions.link"/>
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