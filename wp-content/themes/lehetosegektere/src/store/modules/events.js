import api from '../../api'
import * as types from '../mutation-types'

// initial state
const state = {
  recent: [],
  loaded: false,
}

// getters
const getters = {
  recentEvents: state => limit => {
    if (
      !limit ||
      !Number.isInteger(limit) ||
      typeof limit == 'undefined'
    ) {
      return state.recent;
    }
    let recent = state.recent;
    console.log(typeof recent)
    return recent.slice(0, limit);
  },

  recentEventsLoaded: state => state.loaded,
}

// actions
const actions = {
  getEvents({ commit }, { limit }) {
    api.getEvents(limit, events => {

      commit(types.STORE_FETCHED_EVENTS, { events });
      commit(types.EVENTS_LOADED, true);
      commit(types.INCREMENT_LOADING_PROGRESS);
    });
  },
}

// mutations
const mutations = {
  [types.STORE_FETCHED_EVENTS](state, { events }) {
    state.recent = events;
  },

  [types.EVENTS_LOADED](state, val) {
    state.loaded = val;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
