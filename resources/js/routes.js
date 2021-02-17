import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import client from './routes/client';

export default new VueRouter({
    mode: 'history',
    scrollBehavior: (to, from, savedPosition) => ({ y: 0 }), // scroll to page top
    routes: [
        ...client
    ],
});
