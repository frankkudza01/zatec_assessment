// main.js

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';

const app = createApp(App);

// Parse the token from the URL search params
const urlParams = new URLSearchParams(window.location.search);
const token = urlParams.get('token');

// Store the token in Vuex state and local storage
if (token) {
  store.dispatch('setToken', token);
  localStorage.setItem('token', token);
}

// Retrieve the token from local storage and store it in Vuex state
const storedToken = localStorage.getItem('token');
if (storedToken) {
  store.dispatch('setToken', storedToken);
}

app.use(router);
app.use(store);
app.mount('#app');