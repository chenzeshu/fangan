import Vue from 'vue'
import App from './App'
import uikit from 'uikit'
import jQuery from 'jquery'

Vue.use(jQuery)
Vue.use(uikit)
/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})
