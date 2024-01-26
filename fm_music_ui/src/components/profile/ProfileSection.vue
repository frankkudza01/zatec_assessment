<template>
    <div class="col-sm-12">
        <div class="iq-card">
           <div class="iq-card-body profile-page p-0">
              <div class="profile-header">
                 <div class="cover-container">
                    <img :src="BannerPath" alt="profile-bg" class="rounded img-fluid w-100 profile-image">
                    <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                       <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                       <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                    </ul>
                 </div>
                 <div class="user-detail text-center mb-3">
                    <div class="profile-img">
                       <img :src="LogoPath" alt="profile-img" class="avatar-90 img-fluid" />
                    </div>
                    
                 </div>
                 <div class="profile-info p-4 d-flex align-items-center justify-content-between position-relative">
                    
                    <div class="social-info">
                       <ul class="social-data-block d-flex align-items-center justify-content-between list-inline p-0 m-0">
                          <li class="text-center pl-3">
                             <h6>Total Artists</h6>
                             <p class="mb-0">690</p>
                          </li>
                          <li class="text-center pl-3">
                             <h6>Total Albums</h6>
                             <p class="mb-0">206</p>
                          </li>
                          <li class="text-center pl-3">
                             <h6>Upcoming Albums</h6>
                             <p class="mb-0">100</p>
                          </li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
</template>

<script>
import icon from '@/assets/icon.png';
import banner from '@/assets/banner.jpg';
    export default{
        name: 'ProfileSection',
        components: {

        },

        data() {
            return {
                LogoPath: icon,
                BannerPath: banner,
                divWidth: 40,

            };
        }
    }
</script>

<style>
    .profile-image{
        height:150px;
    }
</style>