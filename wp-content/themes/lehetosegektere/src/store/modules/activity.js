import api from '../../api'
import * as types from '../mutation-types'

// initial state
const state = {
  activities: [],
  loaded: false
}

// getters
const getters = {
  allActivities: state => state.activities,
  allActivitiesLoaded: state => state.loaded
}

// actions
const actions = {
  getAllActivities({ commit }) {
    api.getActivities(activities=> {
      commit(types.STORE_FETCHED_ACTIVITIES, { activities });
      commit(types.ACTIVITIES_LOADED, true);
      commit(types.INCREMENT_LOADING_PROGRESS);
    });
  },
}

// mutations
const mutations = {
  [types.STORE_FETCHED_ACTIVITIES](state, { activities }) {
    state.activities = activities;
  },

  [types.ACTIVITIES_LOADED](state, val) {
    state.loaded = val;
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
