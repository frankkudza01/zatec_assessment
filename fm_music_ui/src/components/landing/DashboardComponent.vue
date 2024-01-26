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
import axios from 'axios';
export default{
    name: 'DashboardComponent',
    components:{
        SideNav,
        HeaderSection,
        DashboardSection
    },

    data() {
        return {
        user: null,
        };
    },

    mounted() {
        // Fetch the user data from the server using the JWT token
        this.fetchUserData();
    },

    methods: {
        fetchUserData() {
        // Retrieve the JWT token from the Vuex store
        const token = this.$store.state.token;

        // Send a request to the Laravel backend to fetch the user data
        axios
            .get('http://localhost:8000/api/get_user/data/', {
            headers: {
                Authorization: `Bearer ${token}`,
            },
            })
            .then((response) => {
            this.user = response.data;
            })
            .catch((error) => {
            console.error(error);
            });
        },
    },

}
</script>