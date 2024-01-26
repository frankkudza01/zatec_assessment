<template>
  <div class="container-fluid">
    <h5>Trending Albums</h5>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-12">
        <div class="mt-3 d-flex search-container">
          <input type="text" class="form-control mr-2" v-model="searchAlbum" placeholder="Search Album" style="border-color: red;">
          <button class="btn btn-primary" @click="searchAlbums">Search</button>
        </div>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-4" v-for="album in filteredAlbums" :key="album.id">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
          <div class="iq-card-body iq-box-relative">
            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
              <i class="ri-play-line"></i>
            </div>
            <p class="text-secondary">{{ album.album_name }}</p>
            <div class="d-flex align-items-center justify-content-between">
              <h6><b>{{ album.artist_name }}</b></h6>
              <div id="iq-chart-box1"></div>
              <span class="text-primary"><b><i class="ri-music-2-line"></i> 10</b></span>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <button class="btn btn-primary" @click="viewSongs(album)">View Songs</button>
              <button class="btn btn-outline-primary" @click="addToFavorites(album)">
                <i class="ri-heart-line"></i> Add to Favorites
              </button>
            </div>
          </div>
          <img :src="album.image" alt="Album Cover" class="img-fluid">
          <a :href="album.url" target="_blank" rel="noopener noreferrer">{{ album.url }}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AlbumsSection',
  data() {
    return {
      albums: [],
      searchAlbum: '',
    };
  },
  computed: {
    filteredAlbums() {
      if (this.searchAlbum) {
        const searchTerm = this.searchAlbum.toLowerCase();
        return this.albums.filter(album => album.album_name && album.album_name.toLowerCase().includes(searchTerm));
      }
      return this.albums;
    }
  },
  methods: {
    searchAlbums() {
      const requestData = {
        album_name: this.searchAlbum
      };

      const token = this.$store.state.token;

      axios.post('http://127.0.0.1:8000/api/albums/search', requestData, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
        })
        .then(response => {
          const filteredAlbums = response.data.albums.filter(album => album.album_name && album.album_name.toLowerCase().includes(this.searchAlbum.toLowerCase()));
          this.albums = filteredAlbums;
        })
        .catch(error => {
          console.error('Error searching albums:', error);
        });
    },
    viewSongs(album) {
      // Implement your logic to view songs for the selected album
      console.log('View songs for album:', album);
    },
    addToFavorites(album) {
      // Implement your logic to add the album to favorites
      console.log('Add album to favorites:', album);
    }
  }
};
</script>


<!-- Styles -->
<style>
.search-container {
  margin-bottom: 2%;
}
</style>