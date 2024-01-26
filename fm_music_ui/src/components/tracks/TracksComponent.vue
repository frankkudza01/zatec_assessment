<template>
    
    <div class="wrapper">
        <HeaderSection/>
        <SideNav/>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <TracksSection/>
            </div>
        </div>
           
    </div>
</template>

<script>
import TracksSection from '@/components/tracks/TracksSection';
import SideNav from '@/components/navigation/SideNav';
import HeaderSection from '@/components/navigation/HeaderSection';
export default {
    name: 'TracksComponent',
    components:{
        SideNav,
        HeaderSection,
        TracksSection
    }
}
</script>