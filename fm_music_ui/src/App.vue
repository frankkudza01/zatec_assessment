<template>
  <router-view/>
</template>


<script>
import { mapMutations } from 'vuex';

export default {
  mounted() {
    const token = localStorage.getItem('token');
    if (token) {
      // Store the token in Vuex
      this.setToken(token);
    }
  },
  methods: {
    ...mapMutations(['setToken']),
  },
};
</script>