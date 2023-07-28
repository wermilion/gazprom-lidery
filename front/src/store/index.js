import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";
import stages from './stagesUser'
import login_request from "./login_request"

Vue.use(Vuex)




export default new Vuex.Store({
  plugins: [createPersistedState()],
  state: {
  },
  getters: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    login_request,
    stages
   
  }
})
