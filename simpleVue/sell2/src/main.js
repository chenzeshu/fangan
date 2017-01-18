// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

//全局引入stylus
import 'common/stylus/index.styl'

Vue.use(VueResource)
Vue.use(VueRouter)

//引入组件
import goods from 'components/goods/goods'
import ratings from 'components/ratings/ratings'
import seller from 'components/seller/seller'


const routes = [
  {path:'/goods',component:goods},
  {path:'/ratings',component:ratings},
  {path:'/seller',component:seller}
]

const router = new VueRouter({
  // mode:"abstract",
  // base:__dirname,
  linkActiveClass:'active',
  routes
})
/* eslint-disable no-new */
const app = new Vue({
  router,
  render: h => h(App)
}).$mount('#app');

// new Vue({
//   el: '#app',
//   template: '<App/>',
//   components: { App },
//   router
// })

//和.$mount('#app')有什么区别
