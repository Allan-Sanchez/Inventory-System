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
import Buy from './components/Buy.vue';
import User from './components/User.vue';
import Inventory from './components/Inventory.vue';
import Location from './components/Location.vue';
import State from './components/State.vue';

let routes = [
    {
        path: '/home',
        component: Home
    },
    {
        path: '/buy',
        component: Buy
    },
    {
        path: '/user',
        component: User
    },
    {
        path: '/inventory',
        component: Inventory
    },
    {
        path: '/location',
        component: Location
    },
    {
        path: '/state',
        component: State
    }
];

export default new VueRouter({
    mode:'history',
    routes
});