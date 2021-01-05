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
            <div class="c-news-swiper__info">
              <h1 class="c-news-swiper__title">{{ post.title.rendered }}</h1>
              <div class="c-news-swiper__meta">
                <div :v-if="post.categories[0]" class="c-news-swiper__tag">#{{ getPostCategoryString(post.categories[0]) }}</div>
                <div :v-if="post.acf.date" class="c-news-swiper__date">{{ post.acf.date }}</div>
                <div :v-if="post.acf.time" class="c-news-swiper__time">{{ post.acf.time }}</div>
              </div>
            </div>
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
  @import "../../assets/css/breakpoints.scss";
  @import "../../assets/css/variables.scss";
  .c-news-swiper {
    position: relative;
    width: 100%;
    height: 100%;
    padding-top: 1vw;
    @include media(">tablet") {
      height: calc((100% / 3) * 2);
    }
    &__inner {
      position: relative;
      width: 100%;
      height: 100%;
    }
    &__main {
      position: absolute;
      top: 0;
      left: 0;
      display: flex;
      flex-direction: column;
      height: 100%;
      width: 100%;
    }
    &__image-container {
      position: absolute;
      width: 100%;
      height: 100%;
    }
    &__image {
      width:100%;
      height:100%;
      object-fit: cover;
      object-position: center;
    }
    &__info {
      padding: 1.15vw;
      margin: 1.15vw;
      background: #fff;
      @include media("<=tablet") {
      }
      @include media(">tablet") {
        max-width: 65%;
      }
    }
    &__title {
      flex-basis: 50%;
      margin: 0;
      font-size: 1.300vw;
      text-transform: uppercase;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-xl-desktop;
      }
    }
    &__meta {
      flex-basis: 50%;
      margin-top: 1em;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop;
      }
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
      margin-top: auto;
      padding: 1.15vw;
      background: #fff;
      @include media("<=tablet") {
        font-size: $text-base-mobile;
      }
      @include media(">tablet") {
        font-size: $text-lg-desktop;
      }
    }
    &__link {
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
    & .swiper-container {
      width: 100%;
      height: 100%;
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