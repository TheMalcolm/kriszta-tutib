import Vue from 'vue'
import Router from 'vue-router'
import HomePage from '@/components/HomePage'
import CosmeticsAppointment from '@/components/CosmeticsAppointment'
import Dashboard from '@/components/Admin/Dashboard'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HomePage',
      component: CosmeticsAppointment
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