import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Example from '../components/Example.vue'
import Top from '../components/Top.vue'
import Header from '../components/HeaderTop.vue'
import Header2 from '../components/Header2.vue'
export default new VueRouter({
    routes:[
        {path:'/example',component:Example,name:'example'},
        {path:'/top',component:Top,name:'top'},
        {path:'/header',component:Header,name:'header'},
        {path:'/header2',component:Header2,name:'header2'},
        {path:'*',redirect:'/example'}
    ]
})