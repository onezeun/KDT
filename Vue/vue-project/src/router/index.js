import Vue from 'vue'
import VueRouter from 'vue-router'
import MainPage from '../components/main_page.vue'
import SubPage from '../components/sub_page.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'main_page',
    component: MainPage
  },
  {
    path: '/main',
    name: 'main_page',
    component: MainPage
  },
  {
    path: '/sub',
    name: 'sub_page',
    component: SubPage
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
