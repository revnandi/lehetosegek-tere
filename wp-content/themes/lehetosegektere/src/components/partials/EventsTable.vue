<template>
  <div class="c-events-table">
    <div class="c-events-table__inner">
      <div class="c-events-table__table-container">
        <table class="c-events-table__table">
          <tr class="c-events-table__row">
            <td class="c-events-table__cell c-events-table__cell--date c-events-table__cell--width-1">Nov.23.</td>
            <td class="c-events-table__cell c-events-table__cell--width-3">Virággal az elfogadásért krókuszültetés</td>
            <td class="c-events-table__cell c-events-table__cell--width-2">VII.kerület</td>
            <td class="c-events-table__cell c-events-table__cell--width-6">#akció</td>
          </tr>
          <tr class="c-events-table__row">
            <td class="c-events-table__cell c-events-table__cell--date c-events-table__cell--width-1">Dec.02.</td>
            <td class="c-events-table__cell c-events-table__cell--width-3">Virággal az elfogadásért krókuszültetés</td>
            <td class="c-events-table__cell c-events-table__cell--width-2">VII.kerület</td>
            <td class="c-events-table__cell c-events-table__cell--width-6">#kiállítás</td>
          </tr>
          <tr class="c-events-table__row">
            <td class="c-events-table__cell c-events-table__cell--date c-events-table__cell--width-1">Dec.14.</td>
            <td class="c-events-table__cell c-events-table__cell--width-3">Virággal az elfogadásért krókuszültetés</td>
            <td class="c-events-table__cell c-events-table__cell--width-2">VII.kerület</td>
            <td class="c-events-table__cell c-events-table__cell--width-6">#buli</td>
          </tr>
          <tr class="c-events-table__row">
            <td class="c-events-table__cell c-events-table__cell--date c-events-table__cell--width-1">Jan.03.</td>
            <td class="c-events-table__cell c-events-table__cell--width-3">Virággal az elfogadásért krókuszültetés</td>
            <td class="c-events-table__cell c-events-table__cell--width-2">VII.kerület</td>
            <td class="c-events-table__cell c-events-table__cell--width-6">#filmvetítés</td>
          </tr>
          <tr class="c-events-table__row">
            <td class="c-events-table__cell c-events-table__cell--date c-events-table__cell--width-1">Feb.10.</td>
            <td class="c-events-table__cell c-events-table__cell--width-3">Virággal az elfogadásért krókuszültetés</td>
            <td class="c-events-table__cell c-events-table__cell--width-2">VII.kerület</td>
            <td class="c-events-table__cell c-events-table__cell--width-6">#akció</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-events-table {
    $self: &;
    &__inner {
      display: flex;
    }
    &__table-container {
      width: 100%;
      min-height: 100%;
      padding: 0.6vw;
      background: #fff;
      @include media("<=tablet") {
        overflow-x: scroll;
      }
    }
    &__table {
      width: 100%;
      height: 100%;
    }
    &__row {
      height: 20%;
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
          padding: 0.6vw 0 0 0;
          border-bottom: none;
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
      }
      &--width-2 {
        width: calc(((100% / 12 ) * 4));
      }
      &--width-3 {
        width: calc(((100% / 12 ) * 4));
      }
      &--width-6 {
        width: calc(((100% / 12 ) * 2));
        border-right: none;
      }
    }
  }
</style>

<script>
import GradientDiamond from './VisualElements/GradientDiamond';

export default {
  components: {
    GradientDiamond
  }
}
</script>