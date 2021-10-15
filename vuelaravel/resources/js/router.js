import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import listisues from './components/listissues.vue';
import Sendissues from './components/Sendissues.vue';
import Adminissuedetail from './components/adminissuedetail.vue';
import Adminissues from './components/adminissues.vue';
import Editissue from './components/editissue.vue';
import Customerissuedetail from './components/customerissuedetail.vue';
const routes = [
    {
        path: '/sendissues',
        component: Sendissues
    },
    {
        path: '/customer',
        component: listisues
    },
    {
        path: '/customerissuedetail',
        component: Customerissuedetail
    },
    {
        path: '/adminissuedetail',
        component: Adminissuedetail
    },
    {
        path: '/admin',
        component: Adminissues
    },
    {
        path: '/editissue',
        component: Editissue
    }
]

export default new Router({
    mode: 'history',
    routes
})