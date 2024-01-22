<template>
    <div class="iq-sidebar">
        <div class="iq-navbar-logo d-flex justify-content-between">
           <a href="" class="header-logo">
            <img img :src="LogoPath" class="img-fluid rounded" alt="">
           </a>
           <div class="iq-menu-bt align-self-center">
              <div class="wrapper-menu">
                 <div class="main-circle"><i class="ri-menu-line"></i></div>
                 <div class="hover-circle"><i class="ri-close-fill"></i></div>
              </div>
           </div>
        </div>
        <hr class="hr-tag">
        <div id="sidebar-scrollbar">
           <nav class="iq-sidebar-menu">
              <ul id="iq-sidebar-toggle" class="iq-menu">
                 <li>
                    <router-link to="/dashboard" class="iq-waves-effect"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Home</span></router-link>
                 </li>
                
                 <li>
                    <router-link to="/artists" class="iq-waves-effect"><i class="las la-users iq-arrow-left"></i><span>Artists</span></router-link>
                 </li>

                 <li>
                    <router-link to="/albums" class="iq-waves-effect"><i class="las la-music iq-arrow-left"></i><span>Albums</span></router-link>
                 </li>

                 <li>
                    <router-link to="/tracks" class="iq-waves-effect"><i class="las la-file-audio iq-arrow-left"></i><span>Tracks</span></router-link>
                 </li>
                
              </ul>
           </nav>
           <div class="p-3"></div>
        </div>
     </div>
</template>

<script>
import icon from '@/assets/icon.png';

    export default{
        name: 'SideNav',
        data() {
            return {
                LogoPath: icon,
                divWidth: 40,

            };
        }
    }
</script>