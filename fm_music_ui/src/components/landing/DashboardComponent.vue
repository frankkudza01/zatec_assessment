<template>
    <div class="wrapper">
        <HeaderSection/>
        <SideNav/>
        <DashboardSection/>

    </div>
</template>

<script>
import SideNav from '@/components/navigation/SideNav';
import HeaderSection from '@/components/navigation/HeaderSection';
import DashboardSection from '@/components/landing/DashboardSection';
import {mapMutations } from 'vuex';
import { mapGetters } from 'vuex';

export default{
    name: 'DashboardComponent',
    components:{
        SideNav,
        HeaderSection,
        DashboardSection
    },
    computed: {
    ...mapGetters(['getToken'])
    },
    mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('token');
    if (token) {
      // Store the token in Vuex
      this.setToken(token);
    }
  },
  methods: {
    ...mapMutations(['setToken']),
  },

}
</script>