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
Vue.component('header-component', require('./components/smallcomponents/HeaderComponent.vue').default);
Vue.component('jumbotron-component', require('./components/smallcomponents/JumbotronComponent.vue').default);
Vue.component('fitur-component', require('./components/smallcomponents/FiturComponent.vue').default);
Vue.component('store-component', require('./components/smallcomponents/StoreComponent.vue').default);
Vue.component('detil-fiture', require('./components/smallcomponents/DetilFiture.vue').default);
Vue.component('daftar-download', require('./components/smallcomponents/DaftarDownload.vue').default);
Vue.component('about-us', require('./components/smallcomponents/AboutUs.vue').default);
Vue.component('carier-component', require('./components/smallcomponents/CarierComponent.vue').default);
Vue.component('footer-component', require('./components/smallcomponents/FooterComponent.vue').default);
Vue.component('edit-fitur', require('./components/EditFitur.vue').default);
// Vue.component('table-component', require('./components/TableComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
