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

      <div class="col-sm-6 col-md-6 col-lg-12" v-for="artist in favoriteArtists" :key="artist.id">
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
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'TracksSection',
  data() {
    return {
      favoriteArtists: [],
      searchArtist: ''
    };
  },
  methods: {
    searchArtists() {
      // Handle search artists functionality using this.searchArtist
    },
    getFavoriteArtists() {
      const token = this.$store.state.token;

      // Make a GET request to the Laravel endpoint to fetch favorite artists
      axios.get('http://127.0.0.1:8000/api/favorite/artists', {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then(response => {
          // Update the favoriteArtists array with the favorite artists data
          this.favoriteArtists = response.data.favorite_artists;
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
    }
  },
  mounted() {
    // Call the getFavoriteArtists method when the component is mounted
    this.getFavoriteArtists();
  }
};
</script>