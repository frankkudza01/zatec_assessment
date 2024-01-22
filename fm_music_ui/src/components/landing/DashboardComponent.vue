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
export default{
    name: 'DashboardComponent',
    components:{
        SideNav,
        HeaderSection,
        DashboardSection
        },
    }
</script>