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
export default {
    name: 'AlbumsComponent',
    components:{
        SideNav,
        HeaderSection,
        AlbumsSection
    }
}
</script>