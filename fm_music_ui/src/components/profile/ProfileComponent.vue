<template> 
    <div class="wrapper">
        <HeaderSection/>
        <SideNav/>
        <div id="content-page" class="content-page">
            <div class="row">
                <ProfileSection/>
               <div class="col-md-6 section-data">
                    <FavouriteArtists/>
               </div>

               <div class="col-md-6">
                    <FavouriteAlbums/>
               </div>

            </div>
        </div>
           
    </div>
</template>

<script>
import FavouriteAlbums from '@/components/profile/albums/FavouriteAlbums';
import FavouriteArtists from '@/components/profile/artists/FavouriteArtists';
import ProfileSection from '@/components/profile/ProfileSection';
import SideNav from '@/components/navigation/SideNav';
import HeaderSection from '@/components/navigation/HeaderSection';
export default {
    name: 'AlbumsComponent',
    components:{
        SideNav,
        HeaderSection,
        FavouriteAlbums,
        FavouriteArtists,
        ProfileSection

    }
}
</script>

<style>
.section-data {
    position: relative;
  }
  
.section-data::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    transform: translateY(-50%);
    width: 0.5px;
    height: 100%;
    background-color: grey;
  }

.search-container {
    margin-bottom: 2%;
}
</style>
