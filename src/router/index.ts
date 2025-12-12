import { createRouter, createWebHistory } from 'vue-router'
import CategoryView from '@/views/CategoryView.vue'
import HomeView from '@/views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },
  {
    path: '/categories/:id',
    name: 'CategoryView',
    component: CategoryView,
    props: true
  },
  {
    path: '/products/:id',
    name: 'productDetails',
    component: () => import('@/views/ProductView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
