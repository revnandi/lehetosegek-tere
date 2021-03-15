import Vue from 'vue';
require('./bootstrap');
import './assets/css/styles.scss';

import {Vue2Storage} from 'vue2-storage'
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

Vue.use(Vue2Storage, {
  prefix: 'app_',
  driver: 'local',
  ttl: 60 * 60 * 24 * 1000 // 24 hours
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
    this.$storage.setOptions({
      prefix: 'app_',
      driver: 'local',
      ttl: 60 * 60 * 24 * 1000 // 24 hours
    });
  },
}).$mount('#app');