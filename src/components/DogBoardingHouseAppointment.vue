<template>
  <div>
    <header style="background-color: #F0A8CC20; ">
      <Bar />
    </header>

    <b-modal ref="dogFormModal" id="dogFormModal" title="dogFormModal" hide-footer>
      <template #modal-title>
        Kutya hozzáadása
      </template>
      <div>
        <b-form-group
          id="petNameGroup"
          label="Kutyus neve:"
          label-for="petName"
          class="labels mb-3"
        >
          <b-form-input
            id="petName"
            v-model="form.petDetails.name"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="petTypeGroup"
          label="Kutyus fajtája:"
          label-for="petType"
          class="labels mb-3"
        >
          <b-form-input
            id="petType"
            v-model="form.petDetails.type"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="petCommentsGroup"
          label="Megjegyzések:"
          description="Kérlek tüntesd fel itt amennyiben kutyusod ételallergiával küzd, vagy bármi féle speciális kérésed lenne!"
          label-for="petComments"
          class="labels mb-4"
        >
          <b-form-textarea
            id="petComments"
            v-model="form.petDetails.comments"
            required
          ></b-form-textarea>
        </b-form-group>

        <b-form-checkbox
          v-model="form.petDetails.extraFeatures.cosmetics"
          name="check-button"
          class="mb-3"
          switch
          @change="calculateTotal"
        >
          <div>
            <p class="label mb-1">
              Teljes kutyakozmetikai szolgáltatás
              <span class="price">6.000 Ft</span>
            </p>
            <p class="description">
              Szépüljön meg kiskedvence míg nálunk tartózkodik. A teljes kezelés
              tartalmazza az alapvető egészségügyi kezelést, fésülést, nyírást
              és karomvágást.
            </p>
          </div>
        </b-form-checkbox>

        <b-form-checkbox
          v-model="form.petDetails.extraFeatures.extraLongWalking"
          name="check-button"
          class="mb-3"
          switch
          @change="calculateTotal"
        >
          <div>
            <p class="label mb-1">
              Extra hosszú séta
              <span class="price">500 Ft / nap</span>
            </p>
            <p class="description">
              Örökmozgó kutyákra kitalálva, napi 8-10km intenzív séta vár
              kiskedvencére amennyiben szeretne élni ezzel a lehetőséggel.
            </p>
          </div>
        </b-form-checkbox>

        <b-form-checkbox
          v-model="form.petDetails.extraFeatures.physiotherapy"
          name="check-button"
          class="mb-3"
          switch
          @change="calculateTotal"
        >
          <div>
            <p class="label mb-1">
              Fizioterápiás foglalkozás
              <span class="price">5.000 Ft</span>
            </p>
            <p class="description">
              A fizioterápia a természet energiáival történő gyógyítást jelenti,
              s mint ilyen, kíméletes, ugyanakkor meglehetősen hatékony segítség
              az elsősorban mozgásszervrendszert érintő betegségek, problémák
              gyógyulásában.
            </p>
          </div>
        </b-form-checkbox>

        <b-button size="sm" @click="submitModalForm()"
          ><b-icon-plus /> Mentés</b-button
        >
      </div>
    </b-modal>

    <b-container class="cont" style="display:flex; flex-wrap: wrap;">
      <input type="hidden" v-model="form.petCount" />
      <b-row class="all">
        <div class="col-12">
          <h1
            style="padding-top: 30px; color: #5c002e; font-family: 'Crimson Pro', serif;"
            class="my-5"
          >
            Foglalj időpontot panziónkba!
          </h1>
        </div>
        <div class="col-lg-9 col-12">
          <b-card class="mb-5">
            <b-card-body style="text-align: left">
              <div class="row">
                <div class="col-lg-3 col-12">
                  <b-form-group
                    id="namegroup"
                    label="Gazdi teljes neve:"
                    label-for="name"
                    class="labels"
                  >
                    <b-form-input
                      id="name"
                      v-model="form.ownerDetails.name"
                      required
                    ></b-form-input>
                  </b-form-group>
                </div>
                <div class="col-lg-3 col-12">
                  <b-form-group
                    id="emailgroup"
                    label="Gazdi e-mail címe:"
                    label-for="email"
                    class="labels"
                  >
                    <b-form-input
                      id="email"
                      v-model="form.ownerDetails.email"
                      required
                    ></b-form-input>
                  </b-form-group>
                </div>
                <div class="col-lg-3 col-12">
                  <b-form-group
                    id="phonegroup"
                    label="Gazdi telefonszáma:"
                    label-for="phone"
                    class="labels"
                  >
                    <b-form-input
                      id="phone"
                      v-model="form.ownerDetails.phone"
                      required
                    ></b-form-input>
                  </b-form-group>
                </div>
                <div class="col-lg-3 col-12">
                  <b-form-group
                    id="intervalGroup"
                    label="Tartózkodás ideje:"
                    label-for="interval"
                    class="labels"
                  >
                    <date-picker
                      v-model="form.interval"
                      type="date"
                      range
                      placeholder="Kérlek add meg a tartózkodás idejét!"
                      :disabled-date="disabledDates"
                      @change="calculateTotal"
                      :clearable="false"
                    ></date-picker>
                  </b-form-group>
                </div>
              </div>

              <b-button class="addNewPetButton" @click="showModal"
                ><b-icon-plus /> Kutya hozzáadása</b-button
              >
            </b-card-body>
          </b-card>
          <div class="row">
            <div
              class="col-lg-6 col-12"
              v-for="(pet, index) in entries"
              :key="index"
            >
              <b-card class="mb-3" style="text-align: left;">
                <b-card-body>
                  <h6>
                    <strong>{{ pet.name }} ({{ pet.type }})</strong>
                  </h6>
                  <p>
                    Megjegyzés: <i>{{ pet.comments }}</i>
                  </p>

                  <p>
                    <b-icon-check-circle-fill
                      v-if="pet.extraFeatures.cosmetics === true"
                    />
                    <b-icon-x-circle-fill v-else /> Kutyakozmetika <br />
                    <b-icon-check-circle-fill
                      v-if="pet.extraFeatures.extraLongWalking === true"
                    />
                    <b-icon-x-circle-fill v-else /> Extra hosszú séta <br />
                    <b-icon-check-circle-fill
                      v-if="pet.extraFeatures.physiotherapy === true"
                    />
                    <b-icon-x-circle-fill v-else /> Fizioterápia
                  </p>

                  <b-button size="sm" @click="removePet(index)" variant="danger"
                    ><b-icon-trash /> Törlés</b-button
                  >
                  <b-button
                    size="sm"
                    @click="editDoggo(index)"
                    variant="outline-primary"
                    ><b-icon-pencil-square /> Módosítás</b-button
                  >
                </b-card-body>
              </b-card>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-12">
          <b-card style="color: #5c002e;" title="Összegzés">
            <b-card-body style="text-align: left; color:#5c002e">
              <div v-if="form.interval != null && form.petCount > 0">
                <div class="sum-row">
                  <span
                    >Alapdíj
                    <span class="price"
                      >{{
                        form.petCount * prices.basePrice * summary.days
                      }}
                      Ft</span
                    ></span
                  >
                  <small class="text-muted"
                    >{{ form.petCount }} kutyus / {{ summary.days }} nap</small
                  >
                </div>

                <div class="sum-row" v-if="summary.cosmeticsCount > 0">
                  <span
                    >Kozmetikai
                    <span class="price"
                      >{{ summary.cosmeticsCount * prices.cosmetics }} Ft</span
                    ></span
                  >
                  <small class="text-muted"
                    >{{ summary.cosmeticsCount }} kutyus</small
                  >
                </div>

                <div class="sum-row" v-if="summary.extraLongWalkingCount > 0">
                  <span
                    >Extra hosszú séta
                    <span class="price"
                      >{{
                        summary.extraLongWalkingCount * prices.extraLongWalking
                      }}
                      Ft</span
                    ></span
                  >
                  <small class="text-muted"
                    >{{ summary.extraLongWalkingCount }} séta</small
                  >
                </div>

                <div class="sum-row" v-if="summary.physiotherapyCount > 0">
                  <span
                    >Fizioterápia
                    <span class="price"
                      >{{
                        summary.physiotherapyCount * prices.physiotherapy
                      }}
                      Ft</span
                    ></span
                  >
                  <small class="text-muted"
                    >{{ summary.physiotherapyCount }} kutyus</small
                  >
                </div>

                <hr />

                <div class="sum-row">
                  <span
                    >Összesen
                    <span class="price">{{ summary.total }} Ft</span></span
                  >
                </div>

                <b-form-checkbox
                  id="checkbox-1"
                  v-model="form.gdprAccepted"
                  name="checkbox-1"
                  value="accepted"
                  unchecked-value="not_accepted"
                >
                  Elfogadom az általános szerződési feltételekben és az
                  adatvédelmi nyilatkozatban foglaltakat.
                </b-form-checkbox>

                <button class="btn btn-save mt-4" v-on:click="submitForm">Időpont lefoglalása</button>
              </div>
              <div v-else class="text-center py-5">
                <b-icon-calendar-check
                  style="width: 75px; height: 75px; opacity: .3; margin-bottom: 15px;"
                />
                <p class="text-muted">
                  Kérlek válassz időtartamot és adj legalább egy kutyust a
                  foglalásodhoz
                </p>
              </div>
            </b-card-body>
          </b-card>
        </div>
      </b-row>
    </b-container>
    <Footer />
  </div>
</template>

<script>
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import _ from "lodash";
import Footer from "./Shared/Footer.vue";
import Bar from "./Shared/Bar.vue";

export default {
  name: "DogBoardingHouseAppointment",

  components: {
    "date-picker": DatePicker,
    Footer,
    Bar
  },

  data() {
    return {
      form: {
        interval: null,
        petCount: null,
        petDetails: {
          name: null,
          type: null,
          extraFeatures: {
            cosmetics: false,
            extraLongWalking: false,
            physiotherapy: false
          },
          comments: null
        },
        ownerDetails: {
          name: null,
          email: null,
          phone: null
        },
        gdprAccepted: "not_accepted"
      },
      underEditing: null,
      entries: [],

      prices: {
        // Base price per dog per day
        basePrice: 4500,

        // Cosmetics price per dog per staying
        cosmetics: 6000,

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
        total: 0.0
      }
    };
  },

  methods: {
    showModal() {
      if (this.form.petCount >= 6) {
        alert("Maximum 6 kiskedvenc adható hozzá!");
        return;
      }

      this.$refs["dogFormModal"].show();
    },

    disabledDates(date) {
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      return date <= today;
    },

    submitModalForm() {
      if (this.underEditing !== null) {
        this.entries[this.underEditing] = this.form.petDetails;
      } else {
        this.entries.push(this.form.petDetails);
        this.form.petCount++;
      }

      this.form.petDetails = {
        name: null,
        type: null,
        comments: null,
        extraFeatures: {
          cosmetics: false,
          extraLongWalking: false,
          physiotherapy: false
        }
      };
      this.underEditing = null;
      this.calculateTotal();
      this.$refs["dogFormModal"].hide();
    },

    async submitForm (e) {
      e.preventDefault()

      const myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");
      myHeaders.append('Accept', 'application/json')

      const raw = JSON.stringify({...this.form, entries: this.entries, total: this.summary.total});

      const requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow"
      };

      const response = await fetch("http://localhost:81/pet-hotel-reservation", requestOptions)

      if(response.ok) {
        const jsonData = await response.json(); 
        this.$swal({
          icon: 'success',
          title: 'Sikeres időpontfoglalás!',
          text: 'Szeretettel várunk a kiválasztott időpontban!',
        })

        this.form = {
            interval: null,
            petCount: null,
            petDetails: {
              name: null,
              type: null,
              extraFeatures: {
                cosmetics: false,
                extraLongWalking: false,
                physiotherapy: false
              },
              comments: null
            },
            ownerDetails: {
              name: null,
              email: null,
              phone: null
            },
            gdprAccepted: "not_accepted"
          }

          this.entries = []
          this.summary = {
            days: null,
            cosmeticsCount: 0,
            extraLongWalkingCount: 0,
            physiotherapyCount: 0,
            total: 0.0
          }
          this.petCount = 0;
      } else {
        if(response.status == 422) {

          let validationErrors = await response.json();
          let html = ``;

          for(const [key, value] of Object.entries(validationErrors)) {
            html += `<li>${value[0]}</li>`;
          }

          this.$swal({
            icon: 'error',
            title: 'Hibás adatok!',
            html: html,
            footer: 'Kérlek ellenőrizd az alábbi hibákat beküldés előtt!' 
          })
        }
      }
    },

    editDoggo(index) {
      this.underEditing = index;
      this.form.petDetails = this.entries[index];
      this.$refs["dogFormModal"].show();
    },

    removePet(index) {
      this.entries.splice(index, 1);
      this.form.petCount--;
      this.calculateTotal();
    },

    calculateTotal() {
      if (this.form.interval != null && this.form.petCount > 0) {
        this.summary = {
          days: null,
          cosmeticsCount: 0,
          extraLongWalkingCount: 0,
          physiotherapyCount: 0,
          total: 0.0
        };

        this.summary.days =
          parseInt(
            (this.form.interval[1].getTime() -
              this.form.interval[0].getTime()) /
              (1000 * 3600 * 24)
          ) + 1;
        this.summary.total +=
          this.summary.days * this.prices.basePrice * this.form.petCount;

        for (const pet of this.entries) {
          if (pet.extraFeatures.cosmetics == true) {
            this.summary.cosmeticsCount++;
          }

          if (pet.extraFeatures.extraLongWalking == true) {
            this.summary.extraLongWalkingCount += this.summary.days;
          }

          if (pet.extraFeatures.physiotherapy == true) {
            this.summary.physiotherapyCount++;
          }
        }

        this.summary.total +=
          this.summary.cosmeticsCount * this.prices.cosmetics;
        this.summary.total +=
          this.summary.extraLongWalkingCount * this.prices.extraLongWalking;
        this.summary.total +=
          this.summary.physiotherapyCount * this.prices.physiotherapy;
      } else {
        this.summary.total = 0.0;
      }
    }
  }
};
</script>

<style>
.bg-info {
  background-color: transparent !important;
}

.btn-save {
  background-color: #5c002e;
  border-radius: 33px;
  color: #ffffff;
  border: 0px;
  text-decoration: none;
}

.btn-save:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
}

.card-1 {
  border: none;
  padding-top: 20px;
}

.cont {
  padding-bottom: 40px;
  min-height: calc(100vh - 200px);
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
.custom-control.custom-switch .custom-control-label p.label {
  font-weight: bold;
  display: flex;
  justify-content: space-between;
}

.custom-control.custom-switch .custom-control-label p.description {
  font-size: 0.9em;
  line-height: 1.2em;
  color: #444;
}

.mx-datepicker.mx-datepicker-range {
  width: 100% !important;
}

.addNewPetButton {
  color: #ffffff;
  background-color: #5c002e;
  position: absolute;
  left: 50%;
  transform: translate(-50%, 21px);
  bottom: 0px;
  border-radius: 33px;
  border: 0px;
}

.addNewPetButton:hover {
  background-color: rgba(240, 168, 204, 20);
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
