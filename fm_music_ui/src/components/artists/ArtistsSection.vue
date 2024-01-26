<template>
  <div class="container-fluid">
    <h5>Artists</h5>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-12">
        <div class="mt-3 d-flex search-container">
          <input type="text" class="form-control mr-2" v-model="searchArtist" placeholder="Search Artist">
          <button class="btn btn-primary" @click="searchArtists">Search</button>
        </div>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-4" v-for="artist in artists" :key="artist.id">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
          <div class="iq-card-body iq-box-relative">
            <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
              <i class="ri-user-line"></i>
            </div>
            <p class="text-secondary">{{ artist.name }}</p>
            <div class="d-flex align-items-center justify-content-between">
              <h6><b>{{ artist.genre }}</b></h6>
              <div id="iq-chart-box1"></div>
              <span class="text-primary"><b><i class="ri-time-line"></i> {{ artist.duration }}</b></span>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <button class="btn btn-outline-primary" @click="addToFavorites(artist)">
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
import axios from 'axios';

export default {
  name: 'TracksSection',
  data() {
    return {
      artists: [],
      searchArtist: ''
    };
  },
  methods: {
    addToFavorites(artist) {
      // Retrieve the authenticated user's ID from the token
      const userId = this.getAuthenticatedUserId(); // Make sure to implement this method

      // Prepare the payload to add the artist to the FavoriteArtist table
      const payload = {
        user_id: userId,
        artist_name: artist.name,
        artist_info: artist.genre
      };
      const token = this.$store.state.token;

      // Make a POST request to the Laravel endpoint
      axios.post('http://127.0.0.1:8000/api/favorite/artists', payload, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then(response => {
          // Handle the response as needed
          console.log(response.data);
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
    },
    searchArtists() {
      // Prepare the payload for the POST request to search for artists
      const payload = {
        name: this.searchArtist
      };
      const token = this.$store.state.token;

      // Make a POST request to the Laravel search endpoint
      axios.post('http://127.0.0.1:8000/api/artists/search', payload, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then(response => {
          // Update the artists array with the search results
          this.artists = response.data.artists;
        })
        .catch(error => {
          // Handle any errors
          console.error(error);
        });
    },
    getAuthenticatedUserId() {
      // Return the user_id directly
      return this.$store.state.user_id;
    }
  }
};
</script>

<style>
.search-container {
  margin-bottom: 2%;
}
</style>