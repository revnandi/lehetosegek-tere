<template>
  <div class="c-page">
    <template v-if="allPagesLoaded">
      <Section backgroundColor="white">
        <Content>
          <h1 v-html="pageContent.title.rendered"></h1>
          <div v-html="pageContent.content.rendered"></div>
        </Content>
      </Section>
    </template>
    <Loader v-else />
  </div>
</template>

<style lang="scss" scoped>
  .c-page {
    width: 100%;
    background: #fff;
  }
</style>

<script>
import Loader from '../partials/Loader.vue';
import { mapGetters } from 'vuex';

import Section from '../partials/Layout/Section';

import Content from '../partials/Content';

export default {
  computed: {
    ...mapGetters({
      page: 'page',
      allPagesLoaded: 'allPagesLoaded',
    }),

    pageContent() {
      return this.page(this.$route.params.pageSlug);
    },
  },

  components: {
    Content,
    Loader,
    Section
  },
};
</script>

<style lang="scss" scoped>
.page-content {
  & >>> p {
    margin-bottom: 1rem;
  }
}
</style>
