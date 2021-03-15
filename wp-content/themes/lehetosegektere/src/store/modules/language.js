import * as types from '../mutation-types';

// initial state
const state = {
  locale: 'hu'
};

// getters
const getters = {
  locale: state => state.locale
};

// actions
const actions = {
  changeLocale({ commit }, { slug }) {
    commit(types.LOCALE_CHANGED, { slug });
  },
};

// mutations
const mutations = {
  [types.LOCALE_CHANGED](state, { slug }) {
    state.locale = slug
  }
};

export default {
  state,
  getters,
  actions,
  mutations,
};
