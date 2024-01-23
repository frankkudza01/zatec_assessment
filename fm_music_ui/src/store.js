import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
  state: {
    token: null,
    user: null,
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
    },
    setUser(state, user) {
      state.user = user;
    },
  },
  actions: {
    async login({ commit }, token) {
      // Set the token in the store
      commit('setToken', token);

      // Set the token in the axios authorization headers
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

      // Fetch the user data and set it in the store
      try {
        const response = await axios.get('/auth/user');
        const user = response.data;
        commit('setUser', user);
      } catch (error) {
        console.error('Failed to fetch user data:', error);
      }
    },
    logout({ commit }) {
      // Clear the token and user data from the store
      commit('setToken', null);
      commit('setUser', null);

      // Remove the token from the axios authorization headers
      delete axios.defaults.headers.common['Authorization'];
    },
  },
});

export default store;