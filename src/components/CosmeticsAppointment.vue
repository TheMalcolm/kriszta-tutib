

<template>
    <div>     
        <div>
  <header style="background-color: #F0A8CC20; ">
    <div class="container">
      <b-navbar toggleable="lg" variant="info" style="padding: 0px;">
        <b-navbar-brand href="/">
          <img src='../assets/tuti-bunda-logo.png' style=" width: 120px; " alt="Logo">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
          <b-navbar-nav>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto " style="color: #5c002e;" >
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#" >
                <router-link class="nav-btn" :to="{ name: 'HomePage' }">Főoldal</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'CosmeticsAppointment' }">Kozmetika</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'HostelAppointment' }">Panzió</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'Calculator' }">Kalkulátor</router-link>
              </b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>

      
      
      
    </div>
  </header>
  


</div>
    <div class="container">
        <div class="row">
            <h1 style="padding-top: 30px; color: #5c002e;">Foglalj időpontot kozmetikánkba!</h1>
            <div class="col-6 offset-3">
                <div class="card p-5 mt-5">
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="name" style="padding-bottom: 10px;">Név</label>
                            <input type="text" class="form-control" v-model="form.name">
                        </div>
                
                        <div class="form-group">
                            <label for="">Nap kiválasztása</label>
                            <select name="day" id="day" v-model="form.day" class="form-control">
                                <option :value="key" v-for="(day, key) in days" v-bind:key="key">{{ day }}</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    
</template>

<script>
import { NavbarPlugin } from 'bootstrap-vue';
import HomePage from './HomePage.vue';
import logo from '../assets/tuti-bunda-logo.png'


export default {
    name: 'CosmeticsAppointment',
    
    
    data() {
        return {
            form: {
                name: '',
            },
            days: {
                day1: '2023 október 6.',
                day2: '2023 október 7.',
            }
        };
    },
    components: { HomePage, NavbarPlugin }
}
</script>

<style scoped>

.bg-info {
  background-color: transparent !important;
}

.nav-btn {
  text-decoration: none;
  color: #5c002e;
  transition: color 0.5s, font-size 0.5s;
  font-size: medium;
}

.nav-btn:hover {
  
  font-size: large;
  }

</style>