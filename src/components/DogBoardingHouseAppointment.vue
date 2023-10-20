<template>
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
            <b-navbar-nav class="ml-auto " style="color: #5c002e;">
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'HomePage' }">Főoldal</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'CosmeticsAppointment' }">Kozmetika</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'DogBoardingHouseAppointment' }">Panzió</router-link>
              </b-nav-item>
            </b-navbar-nav>
          </b-collapse>
        </b-navbar>
      </div>
    </header>

    <b-container class="cont" style="display:flex flex-wrap: wrap;">
      <h1 style="padding-top: 30px; color: #5c002e;" class="my-5">Foglalj időpontot panziónkba!</h1>
      <input type="hidden" v-model="form.petCount" />
      <b-row class="all">
        <div class="col-9">
          <b-card class="mb-5">
            <b-card-body style="text-align: left">
              <div class="row">
                <div class="col-3">
                  <b-form-group id="namegroup" label="Gazdi teljes neve:" label-for="name" class="labels">
                    <b-form-input id="name" v-model="form.ownerDetails.name" required></b-form-input>
                  </b-form-group>
                </div>
                <div class="col-3">
                  <b-form-group id="emailgroup" label="Gazdi e-mail címe:" label-for="email" class="labels">
                    <b-form-input id="email" v-model="form.ownerDetails.email" required></b-form-input>
                  </b-form-group>
                </div>
                <div class="col-3">
                  <b-form-group id="phonegroup" label="Gazdi telefonszáma:" label-for="phone" class="labels">
                    <b-form-input id="phone" v-model="form.ownerDetails.phone" required></b-form-input>
                  </b-form-group>
                </div>
                <div class="col-3">
                  <b-form-group id="intervalGroup" label="Tartózkodás ideje:" label-for="interval" class="labels">
                    <date-picker 
                      v-model="form.interval" 
                      type="date" 
                      range 
                      placeholder="Kérlek add meg a tartózkodás idejét"
                      :disabled-date="disabledDates"
                      @change="calculateTotal"
                      :clearable="false"
                    ></date-picker>
                  </b-form-group>
                </div>
              </div>

              <b-button variant="primary" class="addNewPetButton" @click="addNewPet"><b-icon-plus /> Kutya hozzáadása</b-button>
            </b-card-body>
          </b-card>

          <div class="row">
            <div class="col-6" v-for="(pet, index) in form.petDetails" :key="index">
              <b-card class="mb-3" style="text-align: left;">
                <b-card-body>
                  <div>
                    <b-form-group id="petNameGroup" label="Kiskedvenced neve:" label-for="petName" class="labels mb-3">
                      <b-form-input id="petName" v-model="form.petDetails[index].name" required></b-form-input>
                    </b-form-group>

                    <b-form-group id="petTypeGroup" label="Kiskedvenced fajtája:" label-for="petType" class="labels mb-3">
                      <b-form-input id="petType" v-model="form.petDetails[index].type" required></b-form-input>
                    </b-form-group>

                    <b-form-group id="petCommentsGroup" label="Megjegyzések:" description="Kérlek tüntesd fel itt amennyiben kutyusod ételallergiával küzd, vagy bármi féle speciális kérésed lenne" label-for="petComments" class="labels mb-4">
                      <b-form-textarea 
                        id="petComments" 
                        v-model="form.petDetails[index].comments" 
                        required
                      ></b-form-textarea>
                    </b-form-group>

                    <b-form-checkbox v-model="form.petDetails[index].extraFeatures.cosmetics" name="check-button" class="mb-3" switch @change="calculateTotal">
                      <div>
                        <p class="label mb-1">Teljes kutyakozmetikai szolgáltatás <span class="price">10.000 Ft</span></p>
                        <p class="description">Szépüljön meg kiskedvence míg nálunk tartózkodik. A teljes kezelés tartalmazza az alapvető egészségügyi kezelést, fésülést, nyírást és karomvágást. </p>
                      </div>
                    </b-form-checkbox>

                    <b-form-checkbox v-model="form.petDetails[index].extraFeatures.extraLongWalking" name="check-button" class="mb-3" switch @change="calculateTotal">
                      <div>
                        <p class="label mb-1">Extra hosszú séta <span class="price">500 Ft / nap</span></p>
                        <p class="description">Örökmozgó kutyákra kitalálva, napi 8-10km intenzív séta vár kiskedvencére amennyiben szeretne élni ezzel a lehetőséggel.</p>
                      </div>
                    </b-form-checkbox>

                    <b-form-checkbox v-model="form.petDetails[index].extraFeatures.physiotherapy" name="check-button" class="mb-3" switch @change="calculateTotal">
                      <div>
                        <p class="label mb-1">Fizioterápiás foglalkozás <span class="price">5.000 Ft</span></p>
                        <p class="description">A fizioterápia a természet energiáival történő gyógyítást jelenti, s mint ilyen, kíméletes, ugyanakkor meglehetősen hatékony segítség az elsősorban mozgásszervrendszert érintő betegségek, problémák gyógyulásában.</p>
                      </div>
                    </b-form-checkbox>

                    <b-button size="sm" variant="outline-danger" @click="removePet(index)"><b-icon-trash /> Törlés</b-button>
                  </div>
                </b-card-body>
              </b-card>
            </div>
          </div>
        </div>
        <div class="col-3">
          <b-card title="Összegzés">
            <b-card-body style="text-align: left;">
              <div v-if="form.interval != null && form.petCount > 0">
                <div class="sum-row">
                  <span>Alapdíj <span class="price">{{ form.petCount * prices.basePrice * summary.days }} Ft</span></span>
                  <small class="text-muted">{{ form.petCount }} kutyus / {{ summary.days }} nap</small>
                </div>

                <div class="sum-row" v-if="summary.cosmeticsCount > 0">
                  <span>Kozmetikai <span class="price">{{ summary.cosmeticsCount * prices.cosmetics }} Ft</span></span>
                  <small class="text-muted">{{ summary.cosmeticsCount }} kutyus</small>
                </div>

                <div class="sum-row" v-if="summary.extraLongWalkingCount > 0">
                  <span>Extra hosszú séta <span class="price">{{ summary.extraLongWalkingCount * prices.extraLongWalking }} Ft</span></span>
                  <small class="text-muted">{{ summary.extraLongWalkingCount }} séta</small>
                </div>

                <div class="sum-row" v-if="summary.physiotherapyCount > 0">
                  <span>Fizioterápia <span class="price">{{ summary.physiotherapyCount * prices.physiotherapy }} Ft</span></span>
                  <small class="text-muted">{{ summary.physiotherapyCount }} kutyus</small>
                </div>

                <hr>

                <div class="sum-row">
                  <span>Összesen <span class="price">{{ summary.total }} Ft</span></span>
                </div>

                <b-form-checkbox
                  id="checkbox-1"
                  v-model="form.gdprAccepted"
                  name="checkbox-1"
                  value="accepted"
                  unchecked-value="not_accepted"
                >
                  Elfogadom az általános szerződési feltételekben és az adatvédelmi nyilatkozatban foglaltakat.
                </b-form-checkbox>

                <button class="btn btn-primary mt-4">Időpont lefoglalása</button>
              </div>
              <div v-else class="text-center py-5">
                <b-icon-calendar-check style="width: 75px; height: 75px; opacity: .3; margin-bottom: 15px;"/>
                <p class="text-muted">Kérlek válassz időtartamot és adj legalább egy kutyust a foglalásodhoz</p>
              </div>
            </b-card-body>
          </b-card>
        </div>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import _ from 'lodash'

export default {
  name: 'DogBoardingHouseAppointment',

  components: {
    'date-picker': DatePicker
  },

  data() {
    return {
      form: {
        interval: null,
        petCount: null,
        petDetails: [],
        ownerDetails: {
          name: null,
          email: null,
          phone: null,
        },
        gdprAccepted: 'not_accepted',
      },

      prices: {
        // Base price per dog per day
        basePrice: 4500,
        
        // Cosmetics price per dog per staying  
        cosmetics: 10000,

        // Extra long walk per dog per day
        extraLongWalking: 500,

        // Physiotherapy per dog per stay
        physiotherapy: 5000
      },

      summary: {
        days: null,
        cosmeticsCount: 0,
        extraLongWalkingCount: 0,
        physiotherapyCount: 0,
        total: 0.0,
      }
    }
  },

  methods: {
    disabledDates(date) {
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      return date < today
    },

    addNewPet() {
      if(this.form.petCount >= 6) {
        alert('Maximum 6 kiskedvenc adható hozzá!');
        return
      }

      this.form.petDetails.push({
        name: null,
        type: null,
        comments: null,
        extraFeatures: {
          cosmetics: false,
          extraLongWalking: false,
          physiotherapy: false,
        }
      })
      this.form.petCount++;
      this.calculateTotal()
    },

    removePet(index) {
      this.form.petDetails.splice(index, 1)
      this.form.petCount--;
      this.calculateTotal()
    },

    calculateTotal() {
      if(this.form.interval != null && this.form.petCount > 0) {
        this.summary = {
          days: null,
          cosmeticsCount: 0,
          extraLongWalkingCount: 0,
          physiotherapyCount: 0,
          total: 0.0,
        }

        this.summary.days = parseInt((this.form.interval[1].getTime() - this.form.interval[0].getTime()) / (1000 * 3600 * 24)) + 1
        this.summary.total += this.summary.days * this.prices.basePrice * this.form.petCount;

        for(const pet of this.form.petDetails) {
          if(pet.extraFeatures.cosmetics == true) {
            this.summary.cosmeticsCount++
          }

          if(pet.extraFeatures.extraLongWalking == true) {
            this.summary.extraLongWalkingCount += this.summary.days
          }

          if(pet.extraFeatures.physiotherapy == true) {
            this.summary.physiotherapyCount++
          }
        }

        this.summary.total += this.summary.cosmeticsCount * this.prices.cosmetics
        this.summary.total += this.summary.extraLongWalkingCount * this.prices.extraLongWalking
        this.summary.total += this.summary.physiotherapyCount * this.prices.physiotherapy
      } else {
        this.summary.total = 0.0;
      }

      console.log(this.summary)
    }
  },
}
</script>

<style>
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

.card-1 {
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
  }

  ;

  .cont {
    display: flex;
    justify-content: center;
  }
}


.custom-control.custom-switch {
  display: flex;
  align-items: flex-start;
  gap: 13px;
}

.custom-control.custom-switch input {
  margin-top: 5px;
}

.custom-control.custom-switch .custom-control-label {
  flex-grow: 1;
}
.custom-control.custom-switch .custom-control-label p.label{
  font-weight: bold;
  display: flex;
  justify-content: space-between;
}

.custom-control.custom-switch .custom-control-label p.description {
  font-size: .9em;
  line-height: 1.2em;
  color: #444;
} 

.mx-datepicker.mx-datepicker-range {
  width: 100% !important;
}

.addNewPetButton {
  position: absolute;
  left: 50%;
  transform: translate(-50%, 21px);
  bottom: 0px;
  border: 4px solid #fff;
}

.sum-row {
  margin-bottom: 10px;
}

.sum-row > span {
  font-weight: bold;
  display: flex;
  justify-content: space-between;
}

.custom-control.custom-checkbox {
  display: flex;
  align-items: flex-start;
  gap: 13px;
}

.custom-control.custom-checkbox .custom-control-input {
  margin-top: 5px;
}

.custom-control.custom-checkbox .custom-control-label {
  font-size: 13px;
}
</style>