// import Vue from 'vue';
// import VueRouter from 'vue-router';

// Vue.use(VueRouter);

// export default new VueRouter({
//     mode:'history',
//     routes:[
//         {
//             path:'/',
//             name:'home',
//             component: require('./components/Home.vue')
//         },
//         {
//             path:'/shopping',
//             name:'shopping',
//             component: require('./components/Shopping.vue')
//         }
//     ],
// });

import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Shopping from './components/Shopping.vue';
import User from './components/User.vue';
import Inventory from './components/Inventory.vue';

let routes = [
    {
        path: '/home',
        component: Home
    },
    {
        path: '/shopping',
        component: Shopping
    },
    {
        path: '/user',
        component: User
    },
    {
        path: '/inventory',
        component: Inventory
    }
];

export default new VueRouter({
    mode:'history',
    routes
});