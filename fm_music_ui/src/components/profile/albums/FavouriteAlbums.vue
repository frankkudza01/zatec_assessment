<template>
    <div class="container-fluid">
      <h5>Favourite Albums</h5>
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-12">
            <div class="mt-3 d-flex search-container">
                <input type="text" class="form-control mr-2" v-model="searchAlbum" placeholder="Search Album" style="border-color: red;">
                <button class="btn btn-primary" @click="searchAlbums">Search</button>
            </div>
        </div>
       
        <div class="col-sm-6 col-md-6 col-lg-12" v-for="album in albums" :key="album.id">
          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body iq-box-relative">
              <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                <i class="ri-play-line"></i>
              </div>
              <p class="text-secondary">{{ album.title }}</p>
              <div class="d-flex align-items-center justify-content-between">
                <h6><b>{{ album.artist }}</b></h6>
                <div id="iq-chart-box1"></div>
                <span class="text-primary"><b><i class="ri-music-2-line"></i> 10</b></span>
              </div>
              <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-primary" @click="viewSongs(album)">View Songs</button>
               
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'FavouriteAlbums',
    data() {
      return {
        albums: [
          {
            id: 1,
            title: 'Afro Music Mix',
            artist: 'DJ Puffy'
          },
          {
            id: 2,
            title: 'Cold Heart',
            artist: 'Morgan Heritage'
          },
          {
            id: 3,
            title: 'Hello',
            artist: 'Rihanna'
          }
        ],
        searchAlbum: ''
      };
    },
    methods: {
      viewSongs() {
        // Handle view songs functionality
      },

      searchAlbums() {
        // Handle search albums functionality using this.searchTag
      }
    }
  };
  </script>
