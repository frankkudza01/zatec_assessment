<template>
    <div class="container-fluid">
      <h5>Favourite Artists</h5>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-12">
            <div class="mt-3 d-flex search-container">
                <input type="text" class="form-control mr-2" v-model="searchArtist" placeholder="Search Artist" style="border-color: red;">
                <button class="btn btn-primary" @click="searchArtists">Search</button>
            </div>
        </div>
       
        <div class="col-sm-6 col-md-6 col-lg-12" v-for="artist in songs" :key="artist.id">
          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body iq-box-relative">
              <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                <i class="ri-user-line"></i>
              </div>
              <p class="text-secondary">{{ artist.artist }}</p>
              <div class="d-flex align-items-center justify-content-between">
                <h6><b>{{ artist.genre }}</b></h6>
                <div id="iq-chart-box1"></div>
                <span class="text-primary"><b><i class="ri-time-line"></i> {{ artist.duration }}</b></span>
              </div>
              <div class="d-flex justify-content-between mt-3">
                
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
            artist: 'DJ Puffy',
            songs: "20",
            genre: "Sungura"
          },
          {
            id: 2,
            artist: 'Morgan Heritage',
            songs: "20",
            genre: "Sungura"
          },
          {
            id: 3,
            artist: 'Rihanna',
            songs: "20",
            genre: "Sungura"
          }
        ],
        searchArtist: ''
      };
    },
    methods: {
      
      searchArtists() {
        // Handle search tracks functionality using this.searchTrack
      }
    }
  };
  </script>
