<template>
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
           <nav class="navbar navbar-expand-lg navbar-light p-0">
              <div class="iq-menu-bt d-flex align-items-center">
                 <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-menu-line"></i></div>
                    <div class="hover-circle"><i class="ri-close-fill"></i></div>
                 </div>
                 <div class="iq-navbar-logo d-flex justify-content-between ml-3">
                    <a href="" class="header-logo">
                    <img :src="LogoPath" class="img-fluid rounded" alt="">
                   
                    </a>
                 </div>
              </div>
              <div class="iq-search-bar">
                 <form action="#" class="searchbox">
                    <input type="text" class="text search-input" placeholder="Type here to search...">
                    <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                 </form>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
              <i class="ri-menu-3-line"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ml-auto navbar-list">
                    
                    
                    <li class="nav-item nav-icon">
                       <a href="#" class="search-toggle iq-waves-effect bg-primary rounded">
                       <i class="ri-notification-line"></i>
                       <span class="bg-danger dots"></span>
                       </a>
                       
                    </li>
                    <li class="nav-item nav-icon dropdown">
                       <a href="#" class="search-toggle iq-waves-effect bg-primary rounded">
                       <i class="ri-mail-line"></i>
                       <span class="bg-danger count-mail"></span>
                       </a>
                       
                    </li>
                 </ul>
              </div>
              <ul class="navbar-list">
                 <li class="line-height">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                       
                       <div class="caption">
                          <h6 class="mb-0 line-height">{{ user ? user.name : 'Not logged in' }}</h6>
                          <p class="mb-0" v-if="user">Email: {{ user.email }}</p>
                       </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                       <div class="iq-card shadow-none m-0">
                          <div class="iq-card-body p-0 ">
                            
                             <router-link to="/profile" class="iq-sub-card iq-bg-primary-hover">
                                <div class="media align-items-center">
                                   <div class="rounded iq-card-icon iq-bg-primary">
                                      <i class="ri-file-user-line"></i>
                                   </div>
                                   <div class="media-body ml-3">
                                      <h6 class="mb-0 ">My Profile</h6>
                                      <p class="mb-0 font-size-12">View personal profile details.</p>
                                   </div>
                                </div>
                             </router-link>
                             <router-link to="/profile" class="iq-sub-card iq-bg-primary-hover">
                                <div class="media align-items-center">
                                   <div class="rounded iq-card-icon iq-bg-primary">
                                      <i class="ri-heart-line"></i>
                                   </div>
                                   <div class="media-body ml-3">
                                      <h6 class="mb-0 ">Favourites</h6>
                                      <p class="mb-0 font-size-12">Artists & Albums.</p>
                                   </div>
                                </div>
                             </router-link>
                             
                             <div class="d-inline-block w-100 text-center p-3">
                                <a class="bg-primary iq-sign-btn" href="" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                             </div>
                          </div>
                       </div>
                    </div>
                 </li>
              </ul>
           </nav>
        </div>
     </div>
</template>

<script>
import icon from '@/assets/icon.png';
//import baseURL from '@/components/config';
import axios from 'axios';
     export default{
        name: 'HeaderSection',
       
        data() {
            return {
                LogoPath: icon,
                divWidth: 40,
                user: null,

            };
        },

        created() {
            axios.get('http://127.0.0.1:8000/api/get_user/data/')
            .then(response => {
                this.user = response.data.user;
            })
            .catch(error => {
                console.error(error);
            });
        },

    }
</script>