import Vue from 'vue';
import Router from 'vue-router';

// 라우터로 연결할 페이지 가져오기
import home from './components/home.vue';
import main_page from './components/main_page.vue';
import sub_page from './components/sub_page.vue';

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {path: '/', component: home},
    {path: '/main', component: main_page},
    {path: '/sub', component: sub_page}
  ]
})