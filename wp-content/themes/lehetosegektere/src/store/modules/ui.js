import * as types from '../mutation-types'

// initial state
const state = {
  modal: {
    isModalActive: false,
    pdfUrl: ''
  }
}

// getters
const getters = {
  modal: state => state.modal,
}

// actions
const actions = {
  changePdfUrl({ commit }, { url }) {
    commit(types.UI_MODAL_PDF_URL_CHANGED, { url });
  },
  toggleModal({ commit }) {
    commit(types.UI_TOGGLED);
  },
}

// mutations
const mutations = {
  [types.UI_MODAL_PDF_URL_CHANGED](state, { url }) {
    console.log(url)
    state.modal.pdfUrl = url
  },
  [types.UI_TOGGLED](state) {
    state.modal.isModalActive = !state.modal.isModalActive
  },
}

export default {
  state,
  getters,
  actions,
  mutations
}
