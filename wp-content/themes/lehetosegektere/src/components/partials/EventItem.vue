<template>
  <div class="c-event-item">
    <div class="c-event-item__cell c-event-item__cell--date c-event-item__cell--width-1">{{ formattedDate }}</div>
    <template v-if="this.eventItem.acf.link">
      <a class="c-event-item__cell c-event-item__cell--width-3" v-html="eventItem.title.rendered" :href="this.eventItem.acf.link"></a>
    </template>
    <template v-else>
      <div class="c-event-item__cell c-event-item__cell--width-3" v-html="eventItem.title.rendered"></div>
    </template>
    <template v-if="eventItem.acf.location_link">
      <a class="c-event-item__cell c-event-item__cell--width-2" :href="eventItem.acf.location_link" target="_blank" rel="noopener">
        {{ formattedLocation }}
      </a>
    </template>
    <template v-else>
      <div class="c-event-item__cell c-event-item__cell--width-2">{{ formattedLocation }}</div>
    </template>
    <div class="c-event-item__cell c-event-item__cell--width-6">
      <span v-for="(item, index) in tagsArray" :key="index" class="c-event-item__tag">#{{ item }}</span>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-event-item {
    $self: &;
    display: flex;
    height: calc(100% / 5);
    background: #fff;
    &:first-child {
      padding: 0.6vw 0.6vw 0 0.6vw;
      #{ $self }__cell {
        &:nth-child(2) {
          padding: 0;
        }
        &:nth-child(2) {
          padding: 0.6vw;
        }
        &:nth-child(3) {
          padding: 0.6vw;
        }
        &:nth-child(4) {
          padding: 0.3vw 0.6vw 0 0.6vw;
        }
      }
    }
    &:nth-child(2), &:nth-child(3), &:nth-child(4){
      padding: 0 0.6vw;
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
      padding: 0 0.6vw 0.6vw 0.6vw;
      #{ $self }__cell {
        padding: 0.6vw 0 0 0.6vw;
        border-bottom: none;
        &--date {
          padding: 0.9vw 0 0.3vw 0;
        }
      }
    }
    @include media("<=tablet") {
      min-height: 5em;
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
        font-size: $text-lg-desktop;
      }
      &--date {
        vertical-align: middle;
        padding: 0 0 0.3vw 0;
        line-height: 1;
        border-right: 1px solid #fa52f4;
        @include media("<=tablet") {
          padding: 0.3vw 0.6vw;
          font-size: $text-md-mobile;
        }
        @include media(">tablet") {
          font-size: $text-xl-desktop;
        }
      }
      &--width-1 {
        width: calc(((100% / 12 ) * 2));
        @include media("<=tablet") {
          width: 65vw!important;
        }
      }
      &--width-2 {
        width: calc(((100% / 12 ) * 4));
        @include media("<=tablet") {
          width: 65vw!important;
        }
      }
      &--width-3 {
        width: calc(((100% / 12 ) * 4));
        @include media("<=tablet") {
          width: 120vw!important;
        }
      }
      &--width-6 {
        width: calc(((100% / 12 ) * 2));
        border-right: none;
        @include media("<=tablet") {
          width: 65vw!important;
        }
      }
    }
    &__tag {
      display: inline-block;
      margin-right: 0.5em;
      text-transform: uppercase;
    }
    & a {
      &:hover {
        opacity: 0.75;
      }
    }
  }
</style>

<script>

export default {
  name: 'eventitem',
  title: 'Event Item',
  props: [
    'eventItem'
  ],
  computed: {
    formattedDate() {
      if (this.eventItem.acf.date_start) {
        const correctedDateString = this.eventItem.acf.date_start.replace(/\s/g, 'T')
        const dateToFormat = new Date(correctedDateString);
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
  methods: {
  },
}
</script>