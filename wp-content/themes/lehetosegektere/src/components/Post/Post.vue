<template>
  <div class="c-post">
    <template v-if="post">
      <Section backgroundColor="white">
        <Content>
          <template v-if="$i18n.locale === 'hu'">
            <h1 v-html="post.title.rendered"></h1>
            <div v-html="post.content.rendered"></div>
          </template>
          <template v-else>
            <h1 v-if="post.acf.title_en" v-html="post.acf.title_en"></h1>
            <div v-if="post.acf.content_en" v-html="post.acf.content_en"></div>
          </template>
        </Content>
      </Section>
    </template>
    <Loader v-else/>
  </div>
</template>

<style lang="scss" scoped>
  .c-post {
    width: 100%;
    background: #fff;
  }
</style>

<script>
import axios from "axios";
import Loader from "../partials/Loader.vue";
import { mapGetters } from "vuex";
import SETTINGS from "../../settings";

import Section from '../partials/Layout/Section';

import Content from '../partials/Content';

export default {
  name: 'Post',
  data() {
    return {
      post: false
    };
  },

  components: {
    Section,
    Loader,
    Content
  },

  computed: {},

  beforeMount() {
    this.getPost();
  },

  methods: {
    getPost: function() {
      axios
        .get(
          SETTINGS.API_BASE_PATH + "posts?slug=" + this.$route.params.postSlug
        )
        .then(response => {
          this.post = response.data[0];
        })
        .catch(e => {
          console.log(e);
        });
    }
  }
};
</script>
