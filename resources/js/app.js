require('./bootstrap');

window.Vue = require('vue').default;

import { App, plugin } from '@inertiajs/inertia-vue'
// import vuex from 'vue'
import store from './Store'
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'

import ProductsArchive from '@Component/Products.vue'
import CategoriesArchive from '@Component/Categories.vue'




Vue.mixin({ methods: { route }});
Vue.use(VueRouter)

Vue.use(plugin)
Vue.use(Vuetify)
Vue.use(store)

Vue.component('v-sw', require('./components/ViewSwitcher.vue').default);
Vue.component('add-prod', require('./components/AddProduct.vue').default);
Vue.component('add-cat', require('./components/AddCategorie.vue').default);



const routes = [
  { path: '/products/', name:'products', component: ProductsArchive,  props: true },
  { path: '/categories/', name:'categories', component: CategoriesArchive,  props: true },
  // { path: '/gantt/:id', name:'gantt', component: GanttBoard,  props: true },
  // { path: '/projects', name:'projects', component: Projects,  props: true }
]

const router = new VueRouter({
  routes,
})

const el = document.getElementById('app')

new Vue({
    vuetify: new Vuetify({
     
      theme: {
        options: { customProperties: true },
        themes: {
          light: {
            primary: '#3f51b5',
            secondary: '#b0bec5',
            accent: '#8c9eff',
            error: '#b71c1c',
          },
        },
      },
      
    }),
    store:store,
    router: router
    ,
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
