<template>
    <section class="sign-in-page">
          <div class="container p-0" :style="'width: ' + divWidth + '%'">
              <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center bg-primary rounded">
                  <div class="row m-0">
                    <div class="col-md-12 bg-white sign-in-page-data">
                       
                        <div class="sign-in-from">
                            <a class="sign-in-logo mb-5 text-center" href="#"><img :src="LogoPath" class="img-fluid" alt="logo"></a>
                            <h3 class="mb-0 text-center">Sign in</h3>
                            <p class="text-center text-dark">Welcome to Frank Cool Music FM.</p>
                            <button @click="login" class="btn btn-outline-danger d-block w-100 mb-2"><i class="ri-google-fill"></i> Sign in with google</button>
                            <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="#">Sign up</a></span>
                        </div>
                    </div>
                    
                  </div>
                </div>
              </div>
          </div>
    </section>
</template>


<script>
import icon from '@/assets/icon.png';
import baseURL from '@/components/config';

export default {
  name: 'SigninComponent',
  components: {},
  data() {
    return {
      LogoPath: icon,
      divWidth: 40,
    };
  },
  methods: {
    login() {
      // Redirect the user to the Laravel backend route for Google authentication using the base URL
      window.location.href = `${baseURL}/login/google/`;
    },
  },
 
  mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('access_token');
    if (token) {
      // Get the user data from the query parameters or another source
      const userData = {
        // Replace with the appropriate user data fields
        name: urlParams.get('user_name'),
        email: urlParams.get('user_email'),
      };
      // Store the token and user data in local storage or a cookie for subsequent requests
      localStorage.setItem('token', token);
      localStorage.setItem('user', JSON.stringify(userData));
      // Redirect the user to the Vue frontend dashboard route
      window.location.href = 'localhost:8080/dashboard'; // Replace with the actual Vue frontend dashboard URL
    }
  },
};
</script>