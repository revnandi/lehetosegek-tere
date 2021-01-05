<template>
  <tr class="c-event-item">
    <td class="c-event-item__cell c-event-item__cell--date c-event-item__cell--width-1">{{ formattedDate }}</td>
    <td class="c-event-item__cell c-event-item__cell--width-3">{{ eventItem.title.rendered }}</td>
    <td class="c-event-item__cell c-event-item__cell--width-2">{{ formattedLocation }}</td>
    <td class="c-event-item__cell c-event-item__cell--width-6">
      <span v-for="(item, index) in tagsArray" :key="index" class="c-event-item__tag">#{{ item }}</span>
    </td>
  </tr>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-event-item {
    $self: &;
    height: 1em;
    &:first-child {
    }
    &:nth-child(2), &:nth-child(3), &:nth-child(4){
      #{ $self }__cell {
        padding: 0.6vw;
      }
      #{ $self }__cell{
        &:first-child {
          padding: 0.6vw 0.6vw 0.6vw 0;
        }
      }
    }
    &:last-child {
      #{ $self }__cell {
        padding: 0.6vw 0 0 0.6vw;
        border-bottom: none;
        &--date {
          padding: 0.6vw 0 0 0;
        }
      }
    }
    &__cell {
      vertical-align: top;
      padding: 0 0.6vw 0.6vw 0.6vw;
      text-transform: uppercase;
      border-bottom: 1px solid #fa52f4;
      border-right: 1px solid #fa52f4;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-base-desktop;
      }
      &--date {
        vertical-align: middle;
        padding: 0 0 0.3vw 0;
        line-height: 1;
        border-right: 1px solid #fa52f4;
        @include media("<=tablet") {
          font-size: $text-md-mobile;
        }
        @include media(">tablet") {
          font-size: $text-xl-desktop;
        }
      }
      &--width-1 {
        width: calc(((100% / 12 ) * 2));
        @include media("<=tablet") {
          width: 7em;
        }
      }
      &--width-2 {
        width: calc(((100% / 12 ) * 4));
        @include media("<=tablet") {
          width: auto;
        }
      }
      &--width-3 {
        width: calc(((100% / 12 ) * 4));
        @include media("<=tablet") {
          width: auto;
        }
      }
      &--width-6 {
        width: calc(((100% / 12 ) * 2));
        border-right: none;
        @include media("<=tablet") {
          width: auto;
        }
      }
    }
    &__tag {
      display: inline-block;
      margin-right: 0.5em;
      text-transform: uppercase;
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';
import { convertDateToShortString } from '../../helpers';

export default {
  name: 'eventitem',
  title: 'Event Item',
  props: [
    'eventItem'
  ],
  computed: {
    formattedDate() {
      if (this.eventItem.acf.date_start) {
        const dateToFormat = new Date(this.eventItem.acf.date_start);
        const formattedDate = new Intl.DateTimeFormat('hu-HU', {
          month: 'short',
          day: 'numeric'
        }).format(dateToFormat);
        return formattedDate;
      } else {
        return '?';
      }
    },
    formattedLocation() {
      if (this.eventItem.acf.location) {
        return this.eventItem.acf.location;
      } else {
        return '?';
      }
    },
    tagsArray() {
      if (Object.values(this.eventItem.tag_names).length > 0) {
        return Object.values(this.eventItem.tag_names);
      } else {
        return [''];
      }
    }
  },
}
</script>