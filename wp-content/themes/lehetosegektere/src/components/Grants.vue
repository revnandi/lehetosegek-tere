<template>
  <div v-if="page" class="c-grants">
    <Section backgroundColor="white">
      <HiddenTitle text="Pályázatok"></HiddenTitle>
      <Content>
        <template v-if="$i18n.locale === 'hu'">
          <h1 v-html="pageContent.title.rendered"></h1>
          <div v-html="pageContent.content.rendered"></div>
        </template>
        <template v-else>
          <h1>{{ pageContent.acf.title_en }}</h1>
          <div v-html="pageContent.acf.content_en"></div>
        </template>
      </Content>
    </Section>
    <Section>
      <GrantList v-if="allGrantsLoaded" :grants="allGrants"></GrantList>
      <Loader v-else></Loader>
    </Section>
  </div>
  <Loader v-else></Loader>
</template>

<style lang="scss" scoped>
</style>

<script>
import { mapGetters } from 'vuex';
import Loader from "./partials/Loader.vue";
import Section from './partials/Layout/Section';

import HiddenTitle from './partials/HiddenTitle';
import Content from './partials/Content';
import GrantList from './partials/GrantList';

export default {
  name: 'Grants',
  components: {
    Loader,
    Section,
    HiddenTitle,
    Content,
    GrantList
  },
  data() {
    return {
    }
  },
  computed: {
    ...mapGetters({
      page: 'page',
      allPagesLoaded: 'allPagesLoaded',
      allGrants: 'allGrants',
      allGrantsLoaded: 'allGrantsLoaded',
    }),
    pageContent() {
      return this.page('palyazatok');
    },
  },
  mounted() {
    this.$store.dispatch('getAllGrants');
  }
};
</script>