require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Index from './components/Index.vue'
import Create from './components/Create.vue'
import Show from './components/Show.vue'
import Edit from './components/Edit.vue'

const routes = [
	{ path: '/', name: 'index', component: Index },
  	{ path: '/posts/create', name: 'create', component: Create },
  	{ path: '/posts/:post_id', name: 'show', component: Show },
  	{ path: '/posts/:post_id/edit', name: 'edit', component: Edit },
]

const router = new VueRouter({
  	routes
})

const app = new Vue({
  	router
}).$mount('#app')