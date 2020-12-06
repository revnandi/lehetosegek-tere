<template>
  <div class="page">
    <Section>
      <ActivitiesList :activities="allActivities" :windowWidth="windowWidth"></ActivitiesList>
    </Section>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import axios from "axios";
import SETTINGS from "../settings";
import {debounce} from '../helpers';

import Section from './partials/Layout/Section';

import ActivitiesList from './partials/ActivitiesList';

export default {
  name: 'Activities',
  props: {
    windowWidth: {
      type: Number,
      default: 0
    }
  },
  components: {
    Section,
    ActivitiesList
  },
  data() {
    return {
      activities: false
    }
  },
  computed: {
    ...mapGetters({
      allActivities: 'allActivities',
      allActivitiesLoaded: 'allActivitiesLoaded',
    }),
  },
  mounted() {
    this.$store.dispatch('getAllActivities');
  },
};
</script>