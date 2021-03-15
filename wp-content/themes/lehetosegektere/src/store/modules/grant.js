import api from '../../api'
import * as types from '../mutation-types'

// initial state
const state = {
  grants: [],
  grant: null,
  loaded: false
}

// getters
const getters = {
  allGrants: state => state.grants,
  allGrantsLoaded: state => state.loaded,
  grant: state => id => {
    let field = typeof id === 'number' ? 'id' : 'slug';
    let grant = state.grants.filter(grant => grant[field] === id);
    return (grant[0]) ? grant[0] : false;
  },
  grantContent: state => id => {
    let field = typeof id === 'number' ? 'id' : 'slug';
    let grant = state.grants.filter(grant => grant[field] === id);
    console.log(grant);
    return (grant[0]) ? grant[0].content.rendered : false;
  },
}

// actions
const actions = {
  getAllGrants({ commit }) {
    api.getGrants(grants=> {
      commit(types.STORE_FETCHED_GRANTS, { grants });
      commit(types.GRANTS_LOADED, true);
      commit(types.INCREMENT_LOADING_PROGRESS);
    });
  },
}

// mutations
const mutations = {
  [types.STORE_FETCHED_GRANTS](state, { grants }) {
    state.grants = grants;
  },

  [types.GRANTS_LOADED](state, val) {
    state.loaded = val;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
