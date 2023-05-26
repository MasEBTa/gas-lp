/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// halaman landing-page
Vue.component('header-component', require('./components/landingpage/HeaderComponent.vue').default);
Vue.component('jumbotron-component', require('./components/landingpage/JumbotronComponent.vue').default);
Vue.component('fitur-component', require('./components/landingpage/FiturComponent.vue').default);
Vue.component('store-component', require('./components/landingpage/StoreComponent.vue').default);
Vue.component('detil-fiture', require('./components/landingpage/DetilFiture.vue').default);
Vue.component('daftar-download', require('./components/landingpage/DaftarDownload.vue').default);
Vue.component('about-us', require('./components/landingpage/AboutUs.vue').default);
Vue.component('carier-component', require('./components/landingpage/CarierComponent.vue').default);
Vue.component('footer-component', require('./components/landingpage/FooterComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
