// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import './plugins/axios'
import App from './App'
import router from './router'
import Car from './components/Car'
import CarFilter from './components/CarFilter'
import Order from './components/Order'

Vue.component('car', Car);
Vue.component('car-filter', CarFilter);
Vue.component('order', Order);

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
