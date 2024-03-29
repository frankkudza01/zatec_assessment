import { createRouter, createWebHistory } from 'vue-router'
import ArtistsView from '@/views/ArtistsView'
import AlbumsView from '@/views/AlbumsView'
import DashboardView from '@/views/DashboardView'
import ProfileView from '@/views/ProfileView'
import TracksView from '@/views/TracksView'
import SigninView from '@/views/SigninView'
import SignupView from '@/views/SignupView'


const routes = [
  {
    path: '/',
    name: 'signin',
    component: SigninView
  },


  {
    path: '/signup',
    name: 'signup',
    component: SignupView
  },

  {
    path: '/profile',
    name: 'profile',
    component: ProfileView,
    
  },

  {
    path: '/dashboard',
    name: '/dashboard',
    component: DashboardView,
    
  },

  {
    path: '/tracks',
    name: 'tracks',
    component: TracksView,
    
  },

  {
    path: '/albums',
    name: 'albums',
    component: AlbumsView,
    
  },

  {
    path: '/artists',
    name: 'artists',
    component: ArtistsView,
    
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');

  if (to.meta.requiresAuth && !token) {
    // Redirect to login or unauthorized page if authentication is required but token is missing
    next('/login');
  } else {
    next();
  }
});

export default router;