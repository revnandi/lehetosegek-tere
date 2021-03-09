<template>
  <div class="c-news-swiper" v-if="recentPostsLoaded">
    <swiper ref="mySwiper" :options="swiperOptions">
      <template v-for="post in visibleSlides">
        <swiper-slide v-if="post.acf.youtube" :key="post.id">
          <div class="c-news-swiper__inner">
            <div v-if="post.acf.youtube" class="c-news-swiper__video-container">
              <youtube class="c-news-swiper__video-player" :video-id="getVideoID(post.acf.youtube)" ref="youtube" :nocookie="true" :resize="true" :fitParent="true"></youtube>
              <div class="c-news-swiper__image-placeholder"></div>
            </div>
            <div class="c-news-swiper__main">
              <div class="c-news-swiper__footer">
                <a class="c-news-swiper__link" :href="post.link">{{ $t('buttons.continue') }}</a>
                <a v-if="post.acf.link !== ''" class="c-news-swiper__link" :href="post.acf.link">{{ $i18n.locale === 'hun' ? post.acf.link_text : post.acf.link_text_en }}</a>
              </div>
            </div>
          </div>
        </swiper-slide>
        <swiper-slide v-else :key="post.id">
          <div class="c-news-swiper__inner">

            <div class="c-news-swiper__image-container">
              <img v-if="post.featured_image_sizes" class="c-news-swiper__image lazyload"
                data-sizes="auto"
                width="402px"
                height="230px"
                :src="post.featured_image_sizes.lqip"
                :data-srcset="`${post.featured_image_sizes.thumbnail} 150w,
                ${post.featured_image_sizes.medium} 300w,
                ${post.featured_image_sizes.medium_large} 600w,
                ${post.featured_image_sizes.large} 900w`"
                :alt="$i18n.locale === 'hun' ? post.title.rendered : post.acf.title_en"
              />
              <div v-else class="c-news-swiper__image-placeholder"></div>
            </div>
            <div class="c-news-swiper__main">
              <div class="c-news-swiper__info">
                <h2 class="c-news-swiper__title">
                  <a v-if="post.acf.title_as_link_url && post.acf.title_as_link_url.title_as_link_url !== ''" :href="post.acf.title_as_link_url" v-html="$i18n.locale === 'hun' ? post.title.rendered : post.acf.title_en" class="c-news-swiper__title-link c-news-swiper__title-link--page-url"></a>
                  <a v-else :href="post.link" v-html="$i18n.locale === 'hun' ? post.title.rendered : post.acf.title_en" class="c-news-swiper__title-link c-news-swiper__title-link--post-url"></a>
                </h2>
                <div class="c-news-swiper__meta">
                  <div :v-if="post.categories[0]" class="c-news-swiper__tag">#{{ getPostCategoryString(post.categories[0]) }}</div>
                  <div :v-if="post.acf.date" class="c-news-swiper__date">{{ post.acf.date }}</div>
                  <div :v-if="post.acf.time" class="c-news-swiper__time">{{ post.acf.time }}</div>
                </div>
              </div>
              <div class="c-news-swiper__footer">
                <a class="c-news-swiper__link" :href="post.link">{{ $t('buttons.continue') }}</a>
                <a v-if="post.acf.link !== ''" class="c-news-swiper__link" :href="post.acf.link">{{ post.acf.link_text }}</a>
              </div>
            </div>
          </div>
        </swiper-slide>
      </template>
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
    padding-top: 1vw;
    @include media("<=tablet") {
      margin-top: 5vw;
      height: auto;
    }
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
    &__video-container {
      position: relative;
      width: 100%;
      height: 100%;
      // background-color: #fff;
      &::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #fff;
      }
      &::v-deep iframe {
        position: relative;
        z-index: 1;
        @include media("<=tablet") {
          top: 50%;
          transform: translateY(-50%);
        }
      }
    }
    &__video-player {
      position: absolute;
      z-index: 1;
    }
    &__image-container {
      width: 100%;
      height: 100%;
      @include media("<=tablet") {
        position: relative;
      }
      @include media(">tablet") {
        position: absolute;
      }
    }
    &__image {
      width:100%;
      height:100%;
      object-fit: cover;
      object-position: center;
    }
    &__image-placeholder {
      width:100%;
      height:100%;
      background: rgb(249,16,30);
      background: -moz-linear-gradient(90deg, rgba(249,16,30,1) 0%, rgba(235,107,45,1) 100%);
      background: -webkit-linear-gradient(90deg, rgba(249,16,30,1) 0%, rgba(235,107,45,1) 100%);
      background: linear-gradient(90deg, rgba(249,16,30,1) 0%, rgba(235,107,45,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#f9101e",endColorstr="#eb6b2d",GradientType=1);
    }
    &__info {
      padding: 1.15vw;
      margin: 1.15vw;
      background: rgba(255, 255, 255, 0.75);
      z-index: 2;
      @include media(">tablet") {
        max-width: 65%;
      }
    }
    &__title {
      flex-basis: 50%;
      margin: 0;
      font-size: 1.300vw;
      text-transform: uppercase;
      opacity: 1;
      transition: opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1);
      &:hover {
        opacity: 0.75;
      }
      & a:hover {
        opacity: 0.75;
      }
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
      color: #000;
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
        padding-bottom: 2rem;
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
        text-decoration: underline;
      }
    }
    &__pagination-container {
      position: relative;
      margin-bottom: 0.2vw;
    }
    & .swiper-container {
      width: 100%;
      @include media("<=tablet") {
        height: auto!important;
      }
      @include media(">tablet") {
        height: 100%;
      }
    }
  }
</style>

<script>
import getYouTubeID from 'get-youtube-id';
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
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
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
      carouselOptions: 'carouselOptions'
    }),
    swiper() {
      return this.$refs.mySwiper.$swiper;
    },
    currentCategories() {
      return this.allCategories.map( item => ({name:item.name, name_en:item.acf.name_en, id:item.id}));
    },
    visibleSlides() {
      return this.recentPosts(this.limit).filter(post => post.acf.display_in_slider === true);
    },
    youtubesPlayers() {
      return this.$refs.youtube
    }
  },
  methods: {
    getPostCategoryString(categoryId) {
      if (this.$i18n.locale === 'hu') {
        return this.currentCategories.filter(category=> category.id === categoryId)[0].name;
      } else {
        return this.currentCategories.filter(category=> category.id === categoryId)[0].name_en;
      }
    },
    getVideoID(id) {
      return getYouTubeID(id);
    },
    stopVideos() {
      if(this.$refs.youtube) {
        this.$refs.youtube.forEach(player => {
          player.player.stopVideo()
        });
      }
    },
  },
  mounted() {
    this.$store.dispatch('getPosts', { limit: this.limit });
    this.swiper.on('slideChange', () => {
      this.stopVideos();
    });
    if (this.carouselOptions.autoplay) {
      this.swiper.autoplay.stop();
      this.swiper.params.autoplay.delay = this.carouselOptions.delay;
      this.swiper.autoplay.start();
    } else {
      this.swiper.autoplay.stop();
      this.swiper.params.autoplay = false;
    }
  }
}
</script> 