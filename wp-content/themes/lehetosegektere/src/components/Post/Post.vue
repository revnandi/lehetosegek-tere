<template>
  <div class="c-post">
    <template v-if="post">
      <Section backgroundColor="white">
        <h1>{{ post.title.rendered }}</h1>
        <div v-html="post.content.rendered"></div>
      </Section>
    </template>
    <Loader v-else/>
  </div>
</template>

<style lang="scss" scoped>
  .c-post {
    background: #fff;
  }
</style>

<script>
import axios from "axios";
import Loader from "../partials/Loader.vue";
import { mapGetters } from "vuex";
import SETTINGS from "../../settings";

import Section from '../partials/Layout/Section';

export default {
  name: 'Post',
  data() {
    return {
      post: false
    };
  },

  components: {
    Section,
    Loader
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
