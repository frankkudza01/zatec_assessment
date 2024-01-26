// store.js

import { createStore } from 'vuex';

export default createStore({
  state: {
    token: null
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
    }
  },
  actions: {
    setToken({ commit }, token) {
      commit('setToken', token);
    }
  },
  getters: {
    getToken(state) {
      return state.token;
    }
  }
});