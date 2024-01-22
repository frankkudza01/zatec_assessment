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
        this.fetchUser();
    },

    methods: {
        fetchUser() {
        // Make an API request to fetch the user data and JWT token
        axios.get('http://127.0.0.1:8000/api/login/google/callback/').then((response) => {
            const { user, access_token } = response.data;
            this.user = user;
            // Store the token in local storage or a cookie for subsequent requests
            // You can use a JWT library (e.g., jwt-decode) to extract information from the token
            localStorage.setItem('token', access_token);
        });
        },
    },

}
</script>