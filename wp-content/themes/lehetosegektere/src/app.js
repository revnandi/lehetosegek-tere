import Vue from 'vue';
require('./bootstrap');
import './assets/css/styles.scss';

import VueI18n from 'vue-i18n';
import router from './router';
import App from './App.vue';
import store from './store';
import * as types from './store/mutation-types';

import hu from './locales/hu.json';
import en from './locales/en.json';

const languages = {
  hu: hu,
  en: en
}

const messages = Object.assign(languages)

Vue.use(VueI18n);

const i18n = new VueI18n({
  locale: 'hu',
  fallbackLocale: 'en',
  messages
});

new Vue({
  store,
  router,
  i18n,
  render: h => h(App),
  created() {
    this.$store.commit(types.RESET_LOADING_PROGRESS);
    this.$store.dispatch('getAllOptions');
    this.$store.dispatch('getAllCategories');
    this.$store.dispatch('getAllPages');
  },
}).$mount('#app');