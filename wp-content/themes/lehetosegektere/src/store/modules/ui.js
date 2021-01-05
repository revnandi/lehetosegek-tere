import * as types from '../mutation-types'

// initial state
const state = {
  isMobile: false,
  isVisible: true,
  modal: {
    isModalActive: false,
    pdfUrl: ''
  }
}

// getters
const getters = {
  isVisible: state => state.isVisible,
  modal: state => state.modal,
  isMobile: state => state.isMobile
}

// actions
const actions = {
  changePdfUrl({ commit }, { url }) {
    commit(types.UI_MODAL_PDF_URL_CHANGED, { url });
  },
  toggleModal({ commit }) {
    commit(types.UI_MODAL_TOGGLED);
  },
  toggleMenu({ commit }) {
    commit(types.UI_MENU_TOGGLED);
  },
  showMenu({ commit }, { status }) {
    commit(types.UI_MENU_VISIBLE, { status });
  },
  toggleMobile({ commit }, { status }) {
    commit(types.UI_MOBILE_TOGGLED, { status });
  },
}

// mutations
const mutations = {
  [types.UI_MODAL_PDF_URL_CHANGED](state, { url }) {
    state.modal.pdfUrl = url
  },
  [types.UI_MODAL_TOGGLED](state) {
    state.modal.isModalActive = !state.modal.isModalActive
  },
  [types.UI_MENU_TOGGLED](state) {
    state.isVisible = !state.isVisible
  },
  [types.UI_MENU_VISIBLE](state, { status }) {
    state.isVisible = status
  },
  [types.UI_MOBILE_TOGGLED](state, { status }) {
    state.isMobile = status
  },
}

export default {
  state,
  getters,
  actions,
  mutations
}
