<template>
    
    <div class="wrapper">
        <HeaderSection/>
        <SideNav/>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <ArtistsSection/>
            </div>
        </div>
           
    </div>
</template>

<script>
import ArtistsSection from '@/components/artists/ArtistsSection';
import SideNav from '@/components/navigation/SideNav';
import HeaderSection from '@/components/navigation/HeaderSection';
export default {
    name: 'ArtistsComponent',
    components:{
        SideNav,
        HeaderSection,
        ArtistsSection
    }
}
</script>