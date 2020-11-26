import api from '../../api'
import * as types from '../mutation-types'

// initial state
const state = {
  options: {},
  loaded: false,
  page: null,
}

// getters
const getters = {
  allOptions: state => state.options,
  allOptionsLoaded: state => state.loaded
}

// actions
const actions = {
  getAllOptions({ commit }) {
    api.getOptions(options=> {
      commit(types.STORE_FETCHED_OPTIONS, { options });
      commit(types.OPTIONS_LOADED, true);
      commit(types.INCREMENT_LOADING_PROGRESS);
    });
  },
}

// mutations
const mutations = {
  [types.STORE_FETCHED_OPTIONS](state, { options }) {
    state.options = options;
  },

  [types.OPTIONS_LOADED](state, val) {
    state.loaded = val;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
