<template>
  <div class="c-page">
    <template v-if="allPagesLoaded">
      <Section backgroundColor="white">
        <Content>
          <template v-if="$i18n.locale === 'hu'">
            <h1 v-html="pageContent.title.rendered"></h1>
            <div v-html="pageContent.content.rendered"></div>
          </template>
          <template v-else>
            <h1 v-if="pageContent.acf.title_en" v-html="pageContent.acf.title_en"></h1>
            <div v-if="pageContent.acf.content_en" v-html="pageContent.acf.content_en"></div>
          </template>
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
import Loader from '../partials/Loader';
import { mapGetters } from 'vuex';

import Section from '../partials/Layout/Section';

import Content from '../partials/Content';

export default {
  name: 'Page',
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
