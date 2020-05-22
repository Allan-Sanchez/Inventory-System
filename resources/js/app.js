

require('./bootstrap');

window.Vue = require('vue');


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import router from './router';
import VueTimeago from 'vue-timeago';

Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(VueTimeago,{
    name: 'Timeago', // Component name, `Timeago` by default
    locale: 'es', // Default locale
    // We use `date-fns` under the hood
    // So you can use all locales from it
    locales: {
      'es-MX': require('date-fns/locale/es'),
    //   ja: require('date-fns/locale/ja')
    }
  });

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(),
    data:{
        drawer: null,
    }
});
