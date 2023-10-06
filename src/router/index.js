import Vue from 'vue'
import Router from 'vue-router'
import HomePage from '@/components/HomePage'
import CosmeticsAppointment from '@/components/CosmeticsAppointment'
import Dashboard from '@/components/Admin/Dashboard'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'HomePage',
      component: HomePage
    },
    {
      path: '/idopontfoglalas/kozmetika',
      name: 'CosmeticsAppointment',
      component: CosmeticsAppointment
    },
    {
      path: '/idopontfoglalas/panzio',
      name: 'HostelAppointment',
      component: null
    },
    {
      path: '/kalkulator',
      name: 'Calculator',
      component: null
    },
  ]
})


/**
 * Főoldal
 *  - /
 * Kozmetika foglalás
 *  - /idopontfoglalas/kozmetika
 * Panzió foglalás
 *  - /idopontfoglalas/panzio
 *  - Kalkulátor
 *    - /kalkulator
 * 
 * Admin felület
 *  - /admin/foglalasok
 */