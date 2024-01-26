<template> 
    <div class="wrapper">
        <HeaderSection/>
        <SideNav/>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <AlbumsSection/>
            </div>
        </div>
           
    </div>
</template>

<script>
import AlbumsSection from '@/components/albums/AlbumsSection';
import SideNav from '@/components/navigation/SideNav';
import HeaderSection from '@/components/navigation/HeaderSection';
import { mapMutations } from 'vuex';
import { mapGetters } from 'vuex';
export default {
    name: 'AlbumsComponent',
    components:{
        SideNav,
        HeaderSection,
        AlbumsSection
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