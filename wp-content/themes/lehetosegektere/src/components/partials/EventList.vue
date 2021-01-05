<template>
  <div class="c-event-list">
    <div class="c-event-list__inner">
      <div class="c-event-list__table-container">
        <template v-if="recentEventsLoaded">
          <table class="c-event-list__table">
            <EventItem v-for="item in this.recentEvents(limit)" :key="item.id" :eventItem="item"></EventItem>
          </table>
        </template>
        <template v-else>
          <div class="c-event-list__loader">
            <span>Események betöltése</span>
            <Spinner></Spinner>
          </div>
        </template>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-event-list {
    $self: &;
    @include media("<=tablet") {
      margin-top: 100%;
      overflow-x: scroll;
    }
    &__inner {
      display: flex;
      @include media("<=tablet") {
        width: 200%;
      }
    }
    &__table-container {
      width: 100%;
      min-height: 100%;
      padding: 0.6vw;
      background: #fff;
      @include media("<=tablet") {
        overflow-x: hidden;
      }
    }
    &__table {
      width: 100%;
      height: 100%;
    }
    &__loader {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';
// import SETTINGS from "../settings";
// import {debounce} from '../helpers';

import EventItem from './EventItem';
import Spinner from './Spinner';

export default {
  name: 'eventlist',
  title: 'Event List',
  props: ['limit'],
  // data() {
  //   return {
  //     recentEventsLoaded: false
  //   }
  // },
  components: {
    EventItem,
    Spinner
  },
  computed: {
    ...mapGetters({
      recentEvents: 'recentEvents',
      recentEventsLoaded: 'recentEventsLoaded',
    }),
  },
  mounted() {
    this.$store.dispatch('getEvents', { limit: this.limit });
  }
};
</script>