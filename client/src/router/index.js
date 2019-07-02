import Vue from 'vue'
import Router from 'vue-router'
import Cars from '@/components/Cars'
import PageCar from '@/components/PageCar'
import Register from '@/components/Register'
import Login from '@/components/Login'
import Logout from '@/components/Logout'
import Orders from '@/components/Orders'
import BuyCar from '@/components/BuyCar'

Vue.use(Router)

export default new Router({
  routes: [
    {
        path: '/',
        name: 'Cars',
        component: Cars
    },
    {
        path: '/car/:id',
        name: 'PageCar',
        component: PageCar
    },
    {
        path: '/signUp',
        name: 'Register',
        component: Register
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/logout',
        name: 'Logout',
        component: Logout
    },
    {
        path: '/orders',
        name: 'Orders',
        component: Orders
    },
    {
        path: '/buycar',
        name: 'BuyCar',
        component: BuyCar
    }
  ]
})
