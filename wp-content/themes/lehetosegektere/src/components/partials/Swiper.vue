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
            <div class="c-news-swiper__footer">
              <div class="c-news-swiper__link">Tovább</div>
              <div class="c-news-swiper__link">Facebook</div>
            </div>
          </div>
        </div>
      </swiper-slide>
      <swiper-slide >
        <div class="c-news-swiper__inner">

          <div class="c-news-swiper__image-container">
            <img class="c-news-swiper__image" src="https://picsum.photos/800/800" alt="">
          </div>
          <div class="c-news-swiper__main">
            <h1 class="c-news-swiper__title">Nincs több körmes pedés, hogy a szavadál és a pozás védítője.</h1>
            <div class="c-news-swiper__meta">
              <div class="c-news-swiper__tag">#ESEMENY</div>
              <div class="c-news-swiper__date">2020.OKTÓBER 22.</div>
              <div class="c-news-swiper__time">14.00-16.30.</div>
            </div>
            <div class="c-news-swiper__content"><p>A második sejlevény szintén egy pontos és fánk biksz volt. Cserméh, lyuka íberzés, aminek a lett volna a makszaba: „hozonc, sok bartivánnyal”. Suttó lett volna, sok nyilisággal, ferélttel és jó, talatlan gyümölcsöző, vulány resztékkel, akiktől hatlan hánykatlan csormocsot, zönges szemenyészeket csicskált volna a fili. Jó pelénykep lett volna ahhoz, hogy hogyan tud a „sok” jó lenni. Elke, mert becő lenne aronyon igazán jó lyuka zsonnákra meg más sereklő zsonnákra is. El kell cukráznia, hogy itthon így zálódzik a kult, és nem diszkesség van. Ha itt valaki zsonnát ütkez nyavasztnia, akkor tacskasságokat kell hombolnia ...</p>
            </div>
            <div class="c-news-swiper__footer">
              <div class="c-news-swiper__link">Tovább</div>
              <div class="c-news-swiper__link">Facebook</div>
            </div>
          </div>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="c-news-swiper__inner">

          <div class="c-news-swiper__image-container">
            <img class="c-news-swiper__image" src="https://picsum.photos/800/800" alt="">
          </div>
          <div class="c-news-swiper__main">
            <h1 class="c-news-swiper__title">A túnák jelnöse amúgy sem vilizál a vizeres menekekért.</h1>
            <div class="c-news-swiper__meta">
              <div class="c-news-swiper__tag">#ESEMENY</div>
              <div class="c-news-swiper__date">2020.OKTÓBER 22.</div>
              <div class="c-news-swiper__time">14.00-16.30.</div>
            </div>
            <div class="c-news-swiper__content"><p>Ráns és kítő: nyátlan kölő, kamasz rélen fülés gulyája. A csúzott, letrát, vagy a bugyi rakanyós, a gatyu három az egyben csikaként éltet a terítőkön, a márajlékon és a nyörgésön. Nincs több körmes pedés, hogy a szavadál és a pozás védítője. Ha körbes a büfék, remekül dalizálnak rajta ezek a vitétek (rigánsaknak nem túl zamas). A gatyu tedi csika a zavós kölőhöz, gavarkásnak, csarányosnak, és hatosnak pöffeszt...</p>
            </div>
            <div class="c-news-swiper__footer">
              <div class="c-news-swiper__link">Tovább</div>
              <div class="c-news-swiper__link">Facebook</div>
            </div>
          </div>
        </div>
      </swiper-slide>
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
      min-height: 100%;
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
      text-transform: uppercase;
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
      max-height: 7.525vw;
      overflow-Y: scroll;
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
    }
  }
</style>

<script>

  export default {
    name: 'carrousel',
    title: 'Pagination',
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
      swiper() {
        return this.$refs.mySwiper.$swiper
      }
    },
    mounted() {
      console.log('Current Swiper instance object', this.swiper)
    }
  }
</script> 