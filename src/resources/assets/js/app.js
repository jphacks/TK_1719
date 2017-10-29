
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('header-component', require('./components/HeaderComponent.vue'));
Vue.component('footer-component', require('./components/FooterComponent.vue'));
Vue.component('card-component', require('./components/CardComponent.vue'));
Vue.component('shelfcard-component', require('./components/ShelfCardComponent.vue'));
Vue.component('modal-component', require('./components/ModalComponent.vue'));
Vue.component('modalfr-component', require('./components/ModalFrComponent.vue'));

Vue.component('single-component', require('./components/SingleComponent.vue'));
Vue.component('user-component', require('./components/UserComponent.vue'));
Vue.component('shelf-component', require('./components/ShelfComponent.vue'));
Vue.component('index-component', require('./components/IndexComponent.vue'));

const comp = {}

comp.index = { template: '<index-component></index-component>' }
comp.single = { template: '<single-component></single-component>' }
comp.user = { template: '<user-component></user-component>' }
comp.shelf = { template: '<shelf-component></shelf-component>' }

const routes = [
  { path: '/', component: comp.index },
  { path: '/user', component: comp.user },
  { path: '/shelf', component: comp.shelf },
  { path: '/single', component: comp.single }
]

const router = new VueRouter({
  routes: routes,
  mode: 'history'
})

const app = new Vue({
  router
}).$mount('#app')
