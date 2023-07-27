import Vue from 'vue'
import Vuex from 'vuex'
import stages from './stagesUser'
import login_request from "./login_request"

Vue.use(Vuex)

export default new Vuex.Store({
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
