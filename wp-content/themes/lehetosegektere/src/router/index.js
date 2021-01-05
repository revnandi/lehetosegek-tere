import Vue from 'vue';
import Router from 'vue-router';
import {Swiper as SwiperClass, Pagination, Navigation, Mousewheel, Autoplay, EffectFade} from 'swiper/js/swiper.esm';
import getAwesomeSwiper from 'vue-awesome-swiper/dist/exporter';

import VueSmoothScroll from 'vue2-smooth-scroll';

// Components
import Home from '../components/Home.vue';
import Post from '../components/Post/Post.vue';
import Page from '../components/Page/Page.vue';
import Activities from '../components/Activities.vue';

Vue.use(Router);
Vue.use(VueSmoothScroll, {
  duration: 600,
  updateHistory: false,
  easingFunction: t => 1+(--t)*t*t*t*t
});

SwiperClass.use([Pagination, Mousewheel, Navigation, Autoplay, EffectFade])
Vue.use(getAwesomeSwiper(SwiperClass))
const {Swiper, SwiperSlide} = getAwesomeSwiper(SwiperClass)

import 'swiper/swiper.scss';

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/foglalkozasok',
      name: 'Activities',
      component: Activities,
    },
    {
      // Assuming you're using the default permalink structure for posts
      path: '/:year/:month/:day/:postSlug',
      name: 'Post',
      component: Post,
    },
    {
      path: '/:pageSlug',
      name: 'Page',
      component: Page,
    },
  ],
  mode: 'history',
  base: '',

  // Prevents window from scrolling back to top
  // when navigating between components/views
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  },
});

router.afterEach((to) => { // (to, from)
  // Add a body class specific to the route we're viewing
  let body = document.querySelector('body');

  const slug = !(to.params.postSlug)
    ? to.params.pageSlug
    : to.params.postSlug;
  body.classList.add('vue--page--' + slug);
});

export default router;
