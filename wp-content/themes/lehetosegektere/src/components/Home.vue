<template>
  <div class="page page--home">
    <Section>
      <div class="grid grid-cols-12 gap-6 items-center relative">
        <ScrollIcon></ScrollIcon>
        <div  class="col-span-6">
          <Puzzle/>
        </div>
        <div  class="col-start-7 col-span-6">
          <ScrollBox/>
          <Swiper></Swiper>
        </div>
      </div>
    </Section>
    <Section id="about" :isFullWidth="true">
      <InfoModals/>
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

import Section from './partials/Layout/Section';

import RecentPostsWidget from './widgets/RecentPosts.vue';
import PagesWidget from './widgets/Pages.vue';

import InfoModals from './partials/InfoModals';
import Perks from './partials/Perks';
import Puzzle from './partials/Puzzle';
import ScrollBox from './partials/ScrollBox';
import ScrollIcon from './partials/ScrollIcon';
import Staff from './partials/Staff';
import Swiper from './partials/Swiper';

export default {
  components: {
    InfoModals,
    Section,
    RecentPostsWidget,
    PagesWidget,
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