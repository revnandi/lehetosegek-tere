<template>
  <div class="page">
    <Section>
      <HiddenTitle text="Foglalkozások"></HiddenTitle>
      <ActivitiesList :activities="allActivities" :windowWidth="windowWidth"></ActivitiesList>
    </Section>
    <Modal v-if="modal.isModalActive" :url="modal.pdfUrl"/>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
import axios from "axios";
import SETTINGS from "../settings";
import {debounce} from '../helpers';

import Section from './partials/Layout/Section';

import ActivitiesList from './partials/ActivitiesList';
import HiddenTitle from './partials/HiddenTitle';
import Modal from './partials/Modal';

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
    ActivitiesList,
    HiddenTitle,
    Modal
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
      modal: 'modal'
    }),
  },
  mounted() {
    this.$store.dispatch('getAllActivities');
  },
};
</script>