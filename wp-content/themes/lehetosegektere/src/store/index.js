import Vue from 'vue'
import Vuex from 'vuex'
import * as actions from './actions'
import * as getters from './getters'
import hub from './modules/hub'
import user from './modules/user'
import options from './modules/options'
import ui from './modules/ui'
import events from './modules/events'
import post from './modules/post'
import page from './modules/page'
import activity from './modules/activity'
import grant from './modules/grant'
import categories from './modules/categories'
import language from './modules/language'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  actions,
  getters,
  modules: {
    hub,
    user,
    options,
    ui,
    events,
    post,
    page,
    activity,
    grant,
    categories,
    language
  },
  strict: debug
})
