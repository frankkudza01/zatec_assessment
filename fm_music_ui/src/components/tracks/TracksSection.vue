<template>
    <div class="container-fluid">
      <h5>Tracks</h5>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-12">
            <div class="mt-3 d-flex search-container">
                <input type="text" class="form-control mr-2" v-model="searchTracks" placeholder="Search Track" style="border-color: red;">
                <button class="btn btn-primary" @click="searchTrack">Search</button>
            </div>
        </div>
       
        <div class="col-sm-6 col-md-6 col-lg-4" v-for="song in songs" :key="song.id">
          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body iq-box-relative">
              <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                <i class="ri-play-line"></i>
              </div>
              <p class="text-secondary">{{ song.title }}</p>
              <div class="d-flex align-items-center justify-content-between">
                <h6><b>{{ song.artist }}</b></h6>
                <div id="iq-chart-box1"></div>
                <span class="text-primary"><b><i class="ri-time-line"></i> {{ song.duration }}</b></span>
              </div>
              <div class="d-flex justify-content-between mt-3">
                
                <button class="btn btn-outline-primary" @click="addToFavorites(song)">
                  <i class="ri-heart-line"></i> Add to Favorites
                </button>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'TracksSection',
    data() {
      return {
        songs: [
          {
            id: 1,
            title: 'Afro Music Mix',
            artist: 'DJ Puffy',
            duration: "03:00"
          },
          {
            id: 2,
            title: 'Cold Heart',
            artist: 'Morgan Heritage',
            duration: "03:00"
          },
          {
            id: 3,
            title: 'Hello',
            artist: 'Rihanna',
            duration: "03:00"
          }
        ],
        searchTracks: ''
      };
    },
    methods: {
      
      addToFavorites() {
        // Handle add to favorites functionality
      },
      searchTrack() {
        // Handle search tracks functionality using this.searchTrack
      }
    }
  };
  </script>

<style>
    .search-container {
    margin-bottom: 2%;
    }
</style>