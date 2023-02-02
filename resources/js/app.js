/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default); 
//Vue.component('create-component', require('./components/CreateComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



 require('./bootstrap')

 
 import { createApp } from 'vue'
 import createcomponent from './components/CreateComponent'
 import component2 from './components/Component2'
 import component3 from './components/Component3'
 //import campotexto from './components/Campotexto'
 //import vSelect from 'vue-select'
 //import 'vue-select/dist/vue-select.css';




 
 const app = createApp({})
 
 app.component('createcomponent', createcomponent)
 app.component('component2', component2)
 app.component('component3', component3)
 //app.component('campotexto', campotexto)
 //app.component('v-select', vSelect)



 app.mount('#app')

/*const app = new Vue({
    el: '#app',
});*/
