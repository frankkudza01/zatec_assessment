<template>
    <section class="sign-in-page">
        <div class="container p-0" :style="'width: ' + divWidth + '%'">
            <div class="row no-gutters height-self-center">
              <div class="col-sm-12 align-self-center bg-primary rounded">
                <div class="row m-0">
                  <div class="col-md-12 bg-white sign-in-page-data">
                     
                      <div class="sign-in-from">
                          <a class="sign-in-logo mb-5 text-center" href="#"><img :src="LogoPath" class="img-fluid" alt="logo"></a>
                          <h3 class="mb-0 text-center">Sign up</h3>
                          <p class="text-center text-dark">Welcome to Frank Cool Music FM.</p>
                          <form class="mt-4">
                              <div class="sign-info text-center">
                                  <button type="submit" class="btn btn-outline-danger d-block w-100 mb-2"><i class="ri-google-fill"></i> Sign up</button>
                                  <span class="text-dark dark-color d-inline-block line-height-2">Already have an account? <a href="#">Sign in</a></span>
                              </div>
                          </form>
                          <div class="d-inline-block w-100">
                                    <div class="d-inline-block mt-2 pt-1">
                                        <span class="text-primary">By registering, you agree to our <a href="#" class="text-danger">Terms and Conditions</a> and <a href="#" class="text-danger"> Policy.</a></span>
                                    </div>
                           </div>
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

    export default{
        name: 'SignupComponent',
        components:{

        },

        data() {
            return {
                LogoPath: icon,
                divWidth: 40,

            };
        }
    }
</script>
