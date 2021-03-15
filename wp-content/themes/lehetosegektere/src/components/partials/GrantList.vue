<template>
  <ul class="c-grant-list">
    <div class="grid grid-cols-12 gap-6 items-center relative">
      <div class="col-span-12 md:col-span-4 h-full" v-for="(grant, index) in this.grants" :key="index" >
        <GrantItem :grant="grant"></GrantItem>
      </div>
    </div>
  </ul> 
</template>

<style lang="scss" scoped>
  .c-grant-list {

  }
</style>

<script>
import GrantItem from './GrantItem';

export default {
  name: 'GrantList',
  props: {
    grants: {
      type: Array,
      dafult: () => []
    }
  },
  components: {
    GrantItem
  },
  data() {
    return {
    }
  },
}
</script>