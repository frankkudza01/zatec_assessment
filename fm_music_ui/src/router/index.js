import { createRouter, createWebHistory } from 'vue-router'
import ArtistsView from '@/views/ArtistsView'
import AlbumsView from '@/views/AlbumsView'
import DashboardView from '@/views/DashboardView'
import ProfileView from '@/views/ProfileView'
import TracksView from '@/views/TracksView'
import SigninView from '@/views/SigninView'
import SignupView from '@/views/SignupView'
import store from '@/store'

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
    meta: { requiresAuth: true },
  },

  {
    path: '/dashboard',
    name: 'dashboard',
    component: DashboardView,
    meta: { requiresAuth: true },
  },

  {
    path: '/tracks',
    name: 'tracks',
    component: TracksView,
    meta: { requiresAuth: true },
  },

  {
    path: '/albums',
    name: 'albums',
    component: AlbumsView,
    meta: { requiresAuth: true },
  },

  {
    path: '/artists',
    name: 'artists',
    component: ArtistsView,
    meta: { requiresAuth: true },
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

router.beforeEach((to, from, next) => {
  const token = store.state.token;
  if (to.matched.some((record) => record.meta.requiresAuth) && !token) {
    // Redirect to the sign-in page if the route requires authentication and there's no token
    next('/');
  } else {
    next();
  }
});

export default router
