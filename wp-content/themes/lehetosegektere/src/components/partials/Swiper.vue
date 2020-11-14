<template>
  <div class="c-news-swiper">
    <swiper ref="mySwiper" :options="swiperOptions">
      <swiper-slide>
        <div class="c-news-swiper__inner">

          <div class="c-news-swiper__image-container">
            <img class="c-news-swiper__image" src="https://picsum.photos/800/800" alt="">
          </div>
          <div class="c-news-swiper__main">
            <h1 class="c-news-swiper__title">VIRÁGGAL AZ ELFOGADÁSÉRT Krókuszültetés a VIII.KERÜLETBEN</h1>
            <div class="c-news-swiper__meta">
              <div class="c-news-swiper__tag">#ESEMENY</div>
              <div class="c-news-swiper__date">2020.OKTÓBER 22.</div>
              <div class="c-news-swiper__time">14.00-16.30.</div>
            </div>
            <div class="c-news-swiper__content"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy ...</p>
            </div>
          </div>
        </div>
      </swiper-slide>
      <swiper-slide >Slide 2</swiper-slide>
      <swiper-slide>Slide 3</swiper-slide>
      <swiper-slide>Slide 4</swiper-slide>
      <swiper-slide>Slide 5</swiper-slide>
      <div class="swiper-pagination" slot="pagination"></div>
    </swiper>
  </div>
</template>


<style lang="scss" scoped>
  .c-news-swiper {
    &__inner {
      display: flex;
      flex-direction: row;
    }
    &__main {
      display: flex;
      flex-wrap: wrap;
      flex-basis: calc(100% - 33.3333333333%);
      padding: 0.625vw;
      background-color: #fff;
    }
    &__image-container {
      flex-basis: 33.3333333333%;
      padding-right: 0.875vw;
    }
    &__image {
      display: block;
      width: 100%;
      border-radius: 50%;
    }
    &__title {
      flex-basis: 50%;
      font-size: 0.625vw;
    }
    &__meta {
      flex-basis: 50%;
      text-align: right;
      font-size: 0.625vw;
    }
    &__tag {
      color: #cbcac7;
    }
    &__content {
      flex-basis: 100%;
      font-size: 0.725vw;
      font-family: 'Montserrat', sans-serif;
    }
  }
</style>

<script>
  export default {
    name: 'carrousel',
    title: 'Pagination',
    data() {
      return {
        swiperOption: {
          pagination: {
            el: '.swiper-pagination',
            type: "bullets",
            clickable: true,
          }
        }
      }
    },
    computed: {
      swiper() {
        return this.$refs.mySwiper.$swiper
      }
    },
    mounted() {
      console.log('Current Swiper instance object', this.swiper)
    }
  }
</script> 