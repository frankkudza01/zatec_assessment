<template>
    <div>
        <div>
        <h5>Trending Albums</h5>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4" v-for="(album, index) in albums" :key="index">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-body iq-box-relative">
                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                    <i class="ri-play-line"></i>
                </div>
                <p class="text-secondary">{{ album.title }}</p>
                <div class="d-flex align-items-center justify-content-between">
                    <h6><b>{{ album.artist }}</b></h6>
                    <div id="iq-chart-box1"></div>
                    <span class="text-primary"><b><i class="ri-music-2-line"></i> {{ album.tracks }}</b></span>
                    <button class="btn btn-sm btn-primary" @click="viewSongs(album)">View Songs</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'UpcomingAlbums',
    data() {
      return {
        albums: [
          {
            title: 'Afro Music Mix',
            artist: 'DJ Puffy',
            tracks: '10',
          },
          {
            title: 'Cold Heart',
            artist: 'Morgan Heritage',
            tracks: '10',
          },
          {
            title: 'Hello',
            artist: 'Rihanna',
            tracks: '10',
          },
        ],
      };
    },

    methods: {
        viewSongs(album) {
        // Handle the logic for viewing songs of the selected album
        console.log('Viewing songs of album:', album.title);
        },
    },
  };
  </script>
  
  <style scoped>
  /* Add your film-like styles here */
  </style>