

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
   
      <b-container class="cont" style="display:flex flex-wrap: wrap;">
        <h1 style="padding-top: 30px; color: #5c002e;">Foglalj időpontot kozmetikánkba!</h1>
        <b-row class="all">
          <b-col>
            <div class="card card-1">szöveg</div>
            </b-col>
          <b-col><div class="card card-1">
            <b-form>
              <b-form-group id="namegroup" label="Név:" label-for="name" description="Kérlek a teljes neved add meg!" class="labels" >
          <b-form-input id="name" required></b-form-input>

        </b-form-group>
        <b-form-group id="emailgroup" label="E-mail:" label-for="email" description="" class="labels"  >
          <b-form-input id="email" type="email" required></b-form-input>
        </b-form-group>
        <b-form-group id="phonegroup" label="Telefonszám:" label-for="phone" description="" class="labels"  >
          <b-form-input id="phone"  required></b-form-input>
        </b-form-group>
        <b-form-group id="petgroup" label="Kisállat neve:" label-for="pet" description="" class="labels"  >
          <b-form-input id="pet"  required></b-form-input>
        </b-form-group>
        <b-form-group id="typegroup" label="Kisállat fajtája:" label-for="type" class="labels">
          <b-form-select id="type" v-model="animaltype" :options="animal" class="form-control"></b-form-select>
        </b-form-group>
        
        <div v-if="animaltype == null ">
          <b-form-group id="servicegroup" label="Kívánt szolgáltatás:" label-for="service0" class="labels">
           <b-form-select id="service0" v-model="servicetype"  class="form-control">
              <b-form-select-option value="none" disabled>Kérlek válassz fajtát!</b-form-select-option>
            </b-form-select>
          </b-form-group>
        </div>
        <div v-else-if="animaltype == 'a1'">
          <b-form-group id="servicegroup" label="Kívánt szolgáltatás:" label-for="service1" class="labels">
            <b-form-select id="service1" v-model="servicetype"  class="form-control">
            <b-form-select-option value="eu">EÜ kezelés</b-form-select-option>
            <b-form-select-option value="fn">Fésülés, nyírás</b-form-select-option>
            <b-form-select-option value="ffn">Fürdetés, fésülés, nyírás</b-form-select-option>
            <b-form-select-option value="kv">Karomvágás</b-form-select-option>
            <b-form-select-option value="full">Teljes kozmetika</b-form-select-option>
            </b-form-select>
            </b-form-group>
          <b-form-group id="lenghtgroup" label="Szőr hosszúság:" label-for="lenght" class="labels">
            <b-form-select id="lenght" v-model="lenght"  class="form-control">
              <b-form-select-option value="1" >Rövid</b-form-select-option>
              <b-form-select-option value="2" >Közepes</b-form-select-option>
              <b-form-select-option value="3" >Hosszú</b-form-select-option>
            </b-form-select>
          </b-form-group>
          <b-form-group id="dogsizegroup" label="Kutya mérete:" label-for="dogsize" class="labels">
            <b-form-select id="dogsize" v-model="dogsize"  class="form-control">
              <b-form-select-option value="s" >Kis testű</b-form-select-option>
              <b-form-select-option value="m" >Közepes testű</b-form-select-option>
              <b-form-select-option value="l" >Nagy testű</b-form-select-option>
            </b-form-select>
          </b-form-group>
          
        </div>
        <div v-else-if="animaltype == 'a2'">
          <b-form-group id="servicegroup" label="Kívánt szolgáltatás:" label-for="service1" class="labels">
            <b-form-select id="service1" v-model="servicetype"  class="form-control">
            <b-form-select-option value="eu">EÜ kezelés</b-form-select-option>
            <b-form-select-option value="fn">Fésülés, nyírás</b-form-select-option>
            <b-form-select-option value="ffn">Fürdetés, fésülés, nyírás</b-form-select-option>
            <b-form-select-option value="kv">Karomvágás</b-form-select-option>
            <b-form-select-option value="full">Teljes kozmetika</b-form-select-option>
            </b-form-select>
            </b-form-group>
          <b-form-group id="lenghtgroup" label="Szőr hosszúság:" label-for="lenght" class="labels">
            <b-form-select id="lenght" v-model="lenght"  class="form-control">
              <b-form-select-option value="1" >Rövid</b-form-select-option>
              <b-form-select-option value="3" >Hosszú</b-form-select-option>
            </b-form-select>
          </b-form-group>
        </div>
        <div v-else>
          <b-form-group id="servicegroup" label="Kívánt szolgáltatás:" label-for="service1" class="labels">
            <b-form-select id="service1" v-model="servicetype"  class="form-control">
            <b-form-select-option value="eu">EÜ kezelés</b-form-select-option>
            <b-form-select-option value="fn">Fésülés, nyírás</b-form-select-option>
            <b-form-select-option value="kv">Karomvágás</b-form-select-option>
            <b-form-select-option value="full">Teljes kozmetika</b-form-select-option>
            </b-form-select>
            </b-form-group>
          <b-form-group id="lenghtgroup" label="Szőr hosszúság:" label-for="lenght" class="labels">
            <b-form-select id="lenght" v-model="lenght"  class="form-control">
              <b-form-select-option value="1" >Rövid</b-form-select-option>
              <b-form-select-option value="3" >Hosszú</b-form-select-option>
            </b-form-select>
          </b-form-group>
        </div>
        
        <div class="servtime" v-if="treatmentDuration !== null">
      Ez a kezelés {{ treatmentDuration }} percet fog tartani.
    </div>
            </b-form>
          </div></b-col>
        </b-row>
      </b-container>
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
          animaltype: null,
          servicetype: null,
          dogsize: null,
          lenght: null,
          treatmentDuration: null,
            form: {
                name: '',
            },
            animal: [
              {value: 'a1', text:'Kutya'},
              {value: 'a2', text:'Macska'},
              {value: 'a3', text:'Nyúl'},
              {value: 'a4', text:'Tengerimalac'},
            ],
            days: {
                day1: '2023 október 6.',
                day2: '2023 október 7.',
            },
            serviceDurations: {
              'kv-1-a3-o': 15,
              'kv-3-a3-o': 15,
              'fn-1-a3-o': 30,
              'fn-3-a3-o': 45,
              'eu-1-a3-o': 30,
              'eu-3-a3-o': 30,
              'full-1-a3-o': 60,
              'full-3-a3-o': 75,
              'kv-1-a4-o': 15,
              'kv-3-a4-o': 15,
              'fn-1-a4-o': 30,
              'fn-3-a4-o': 45,
              'eu-1-a4-o': 30,
              'eu-3-a4-o': 30,
              'full-1-a4-o': 60,
              'full-3-a4-o': 75,
              'fn-1-a2-o': 45,
              'fn-3-a2-o': 60,
              'eu-1-a2-o': 30,
              'eu-3-a2-o': 30,
              'ffn-1-a2-o': 60,
              'ffn-3-a2-o': 90,
              'kv-1-a2-o': 15,
              'kv-3-a2-o': 15,
              'full-1-a2-o': 90,
              'full-3-a2-o': 120,
              'kv-1-a1-s': 15,
              'kv-2-a1-s': 15,
              'kv-3-a1-s': 15,
              'kv-1-a1-m': 15,
              'kv-2-a1-m': 15,
              'kv-3-a1-m': 15,
              'kv-1-a1-l': 15,
              'kv-2-a1-l': 15,
              'kv-3-a1-l': 15,
              'fn-1-a1-s': 30,
              'fn-2-a1-s': 45,
              'fn-3-a1-s': 60,
              'fn-1-a1-m': 45,
              'fn-2-a1-m': 60,
              'fn-3-a1-m': 75,
              'fn-1-a1-l': 45,
              'fn-2-a1-l': 60,
              'fn-3-a1-l': 90,
              'fnn-1-a1-s': 45,
              'fnn-2-a1-s': 60,
              'fnn-3-a1-s': 90,
              'fnn-1-a1-m': 60,
              'fnn-2-a1-m': 90,
              'fnn-3-a1-m': 120,
              'fnn-1-a1-l': 60,
              'fnn-2-a1-l': 90,
              'fnn-3-a1-l': 120,
              'eu-1-a1-s': 30,
              'eu-2-a1-s': 30,
              'eu-3-a1-s': 30,
              'eu-1-a1-m': 30,
              'eu-2-a1-m': 30,
              'eu-3-a1-m': 30,
              'eu-1-a1-l': 30,
              'eu-2-a1-l': 30,
              'eu-3-a1-l': 30,
              'full-1-a1-s': 60,
              'full-2-a1-s': 70,
              'full-3-a1-s': 90,
              'full-1-a1-m': 75,
              'full-2-a1-m': 90,
              'full-3-a1-m': 120,
              'full-1-a1-l': 90,
              'full-2-a1-l': 120,
              'full-3-a1-l': 150,
                  }
            };
    },
    components: { HomePage, NavbarPlugin },
    
    watch: {
    servicetype: 'calculateTreatmentDuration',
    lenght: 'calculateTreatmentDuration',
    animaltype: 'calculateTreatmentDuration',
    dogsize: 'calculateTreatmentDuration',
  },
    methods: {
    calculateTreatmentDuration() {
      if (['a2', 'a3', 'a4'].includes(this.animaltype)) {
    this.dogsize = 'o';
      }
      const key = `${this.servicetype}-${this.lenght}-${this.animaltype}-${this.dogsize}`;
      this.treatmentDuration = this.serviceDurations[key] || null;
      console.log(key)
    }
  }
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

.card-1{
  border: none;
  padding-top: 20px;
}

.cont {
  padding-bottom: 40px;
}

.labels {
  text-align: left;
  color: #5c002e;
  padding-bottom: 10px;
}

.selectors {
  width: 100%;
  height: 37.6px;
  border-radius: 6px;
  
}
.servtime {
  color: #5c002e;
  padding-top: 15px;
}

@media screen and (max-width: 573px) {
  .all {
  display: flex;
  flex-direction: column;
  
  
  margin: 0px;
};
  .cont {
    display: flex;
    justify-content: center;
  }
}




</style>