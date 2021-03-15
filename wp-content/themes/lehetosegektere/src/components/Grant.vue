<template>
  <div class="c-page">
    <template v-if="allGrantsLoaded">
      <Section backgroundColor="white">
        <Content>
          <h1 v-html="grantContent.title.rendered"></h1>
          <div v-html="grantContent.content.rendered"></div>
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
import Loader from './partials/Loader';
import { mapGetters } from 'vuex';

import Section from './partials/Layout/Section';

import Content from './partials/Content';

export default {
  name: 'Grant',
  computed: {
    ...mapGetters({
      grant: 'grant',
      allGrantsLoaded: 'allGrantsLoaded',
    }),

    grantContent() {
      return this.grant(this.$route.params.grantSlug);
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
