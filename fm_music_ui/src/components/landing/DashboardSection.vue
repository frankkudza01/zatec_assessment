<template>
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <TrendingSongs/>
         <UpcomingAlbums/>
      </div>
   </div>
</template>

<script>
import TrendingSongs from '@/components/landing/elements/TrendingSongs';
import UpcomingAlbums from '@/components/landing/elements/UpcomingAlbums';
     export default{
        name: 'DashboardSection',
        components:{
         TrendingSongs,
         UpcomingAlbums
        }

    }
</script>
