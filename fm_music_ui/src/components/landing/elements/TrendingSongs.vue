<template>
    <div>
      <div>
         <h5>Trending Songs</h5>
         <div class="row">
           <div class="col-sm-4" v-for="(song, index) in songs" :key="index">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-body iq-box-relative">
                 <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                   <i class="ri-headphone-fill"></i>
                 </div>
                 <p class="text-secondary">{{ song.title }}</p>
                 <div class="d-flex align-items-center justify-content-between">
                   <h6><b>{{ song.artist }}</b></h6>
                   <div id="iq-chart-box1"></div>
                   <span class="text-primary"><b><i class="ri-time-line"></i> {{ song.duration }}</b></span>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
</template>

<script>
     export default{
        name: 'TrendingSongs',
        components:{

        },

        data() {
         return {
            songs: [
            {
               title: "Afro Music Mix",
               artist: "DJ Puffy",
               duration: "03:00"
            },
            {
               title: "Cold Heart",
               artist: "Morgan Heritage",
               duration: "03:00"
            },
            {
               title: "Hello",
               artist: "Rihanna",
               duration: "03:00"
            }
            ]
         };
      }

    };
</script>

<style>
   .slide {
   display: flex;
   justify-content: center;
   }
</style>