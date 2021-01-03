require('./vendor/bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Pagination laravel-vue-pagination
Vue.component('pagination', require('laravel-vue-pagination'));

let Event = new Vue();
window.Event = Event;

// Admin
Vue.component('category-table', require('./components/admin/category/CategoryTable.vue').default);
Vue.component('category-form', require('./components/admin/category/CategoryForm.vue').default);
Vue.component('skill-table', require('./components/admin/skill/SkillTable').default);
Vue.component('skill-form', require('./components/admin/skill/SkillForm.vue').default);
Vue.component('select2', require('./components/Select2.vue').default);
Vue.component('multi-select2', require('./components/MultiSelect2.vue').default);

// User
Vue.component('profile-display', require('./components/user/profile/ProfileDisplay').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
});
