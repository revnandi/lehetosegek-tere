<template>
  <div class="c-activities-list">
    <div class="grid grid-cols-12 gap-6 items-center relative">
      <div class="col-span-12 md:col-span-3 h-full" v-for="(activity, index) in this.activities" :key="index" >
        <ActivitiesItem :activity="activity" :windowWidth="windowWidth"></ActivitiesItem>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
  .c-activities-list {

  }
</style>

<script>
import ActivitiesItem from './ActivitiesItem';

export default {
  props: [
    'activities',
    'windowWidth'
  ],
  data() {
    return {
      loaded: false
    }
  },
  components: {
    ActivitiesItem
  }
}
</script>