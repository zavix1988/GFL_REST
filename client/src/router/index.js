import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Cars from '@/components/Cars'
import PageCar from '@/components/PageCar'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
        path: '/cars',
        name: 'Cars',
        component: Cars
    },
    {
        path: '/car/:id',
        name: 'PageCar',
        component: PageCar
    }
  ]
})
