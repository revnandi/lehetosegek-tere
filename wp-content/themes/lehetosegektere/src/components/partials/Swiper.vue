<template>
  <div class="c-news-swiper" v-if="recentPostsLoaded">
    <swiper ref="mySwiper" :options="swiperOptions">
      <swiper-slide v-for="post in recentPosts(limit)" :key="post.id">
        <div class="c-news-swiper__inner">

          <div class="c-news-swiper__image-container">
            <img class="c-news-swiper__image lazyload"
              data-sizes="auto"
              :src="post.featured_image_sizes.lqip"
              :data-srcset="`${post.featured_image_sizes.thumbnail} 150w,
              ${post.featured_image_sizes.medium} 300w,
              ${post.featured_image_sizes.medium_large} 600w,
              ${post.featured_image_sizes.large} 900w`"
              alt=""
            />
          </div>
          <div class="c-news-swiper__main">
            <h1 class="c-news-swiper__title">{{ post.title.rendered }}</h1>
            <div class="c-news-swiper__meta">
              <div :v-if="post.categories[0]" class="c-news-swiper__tag">#{{ getPostCategoryString(post.categories[0]) }}</div>
              <div :v-if="post.acf.date" class="c-news-swiper__date">{{ post.acf.date }}</div>
              <div :v-if="post.acf.time" class="c-news-swiper__time">{{ post.acf.time }}</div>
            </div>
            <div class="c-news-swiper__content" v-html="post.excerpt.rendered"></div>
            <div class="c-news-swiper__footer">
              <a class="c-news-swiper__link" :href="post.link">Tovább</a>
              <a class="c-news-swiper__link" :href="post.acf.link">{{ post.acf.link_text }}</a>
            </div>
          </div>
        </div>
      </swiper-slide>
      <div class="swiper-pagination" slot="pagination"></div>
    <!-- <div class="c-news-swiper__pagination-container">
    </div> -->
    </swiper>
  </div>
</template>


<style lang="scss" scoped>
  .c-news-swiper {
    position: relative;
    padding-top: 1.150vw;
    &__inner {
      display: flex;
      flex-direction: row;
    }
    &__main {
      display: flex;
      flex-wrap: wrap;
      flex-basis: calc((100% / 3) * 2);
      min-height: 100%;
      padding: 0.625vw;
      background-color: #fff;
    }
    &__image-container {
      position:relative;
      height:0;
      flex-basis: calc((100% / 3) - 0.875vw);
      padding-bottom: calc((100% / 3) - 0.875vw);
      margin-right: 0.875vw;
    }
    &__image {
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
      border-radius: 50%;
      object-fit: cover;
    }
    &__title {
      flex-basis: 50%;
      margin: 0;
      font-size: 0.625vw;
      text-transform: uppercase;
    }
    &__meta {
      flex-basis: 50%;
      text-align: right;
      font-size: 0.625vw;
    }
    &__tag {
      color: #cbcac7;
      text-transform: uppercase;
    }
    &__date {
      text-transform: uppercase;
    }
    &__time {
      text-transform: uppercase;
    }
    &__content {
      flex-basis: 100%;
      max-height: 7.525vw;
      font-size: 0.725vw;
      font-family: 'Montserrat', sans-serif;
    }
    &__footer {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      width: 100%;
    }
    &__link {
      font-size: 0.625vw;
      text-transform: uppercase;
      opacity: 1;
      transition: opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1);
      &:hover {
        opacity: 0.75;
      }
    }
    &__pagination-container {
      position: relative;
      margin-bottom: 0.2vw;
    }
  }
</style>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'carrousel',
  title: 'Swiper',
  props: ['limit'],
  data() {
    return {
      swiperOptions: {
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 400,
        pagination: {
          el: '.swiper-pagination',
          type: "bullets",
          clickable: true,
        }
      }
    }
  },
  computed: {
    ...mapGetters({
      allCategories: 'allCategories',
      allCategoriesLoaded: 'allCategoriesLoaded',
      recentPosts: 'recentPosts',
      recentPostsLoaded: 'recentPostsLoaded',
    }),
    swiper() {
      return this.$refs.mySwiper.$swiper;
    },
    currentCategories() {
      return this.allCategories.map( item => ({name:item.name, id:item.id}));
    },

  },
  methods: {
    getPostCategoryString(categoryId) {
      return this.currentCategories.filter(category=> category.id === categoryId)[0].name;
    }
  },
  mounted() {
    this.$store.dispatch('getPosts', { limit: this.limit });
    console.log('Current Swiper instance object', this.swiper);
  }
}
</script> 