<template>
  <div>
    <header style="background-color: #F0A8CC20; ">
      <Bar />
    </header>

    <b-container class="cont">
      <b-col xs="12">
        <h1
          style="padding-top: 30px; color: #5c002e; font-family: 'Crimson Pro', serif;"
          class="my-5"
        >
          Foglalj időpontot kozmetikánkba!
        </h1>
      </b-col>
      <b-row class="all">
        <b-col xs="12">
          <p>A csillaggal jelölt mezők kitöltés kötelező!</p>
          <div class="card card-1">
            <ValidationObserver ref="observer" v-slot="{ submitForm }">
              <b-form @submit.prevent="submitForm(onSubmit)">
                <ValidationProvider
                  name="name"
                  rules="required"
                  v-slot="{ errors, valid }"
                >
                  <b-form-group
                    id="namegroup"
                    label="*Gazdi teljes neve:"
                    label-for="name"
                    description="Kérlek a teljes neved add meg!"
                    class="labels"
                  >
                    <b-form-input
                      id="name"
                      v-model="form.name"
                      placeholder="Minta Marcsi"
                      required
                      :state="errors[0] ? false : valid ? true : null"
                    ></b-form-input>
                    <b-form-invalid-feedback>{{
                      errors[0]
                    }}</b-form-invalid-feedback>
                  </b-form-group>
                </ValidationProvider>

                <ValidationProvider
                  name="email"
                  rules="required|email"
                  v-slot="{ errors, valid }"
                >
                  <b-form-group
                    id="emailgroup"
                    label="*Gazdi e-mail címe:"
                    label-for="email"
                    description=""
                    class="labels"
                  >
                    <b-form-input
                      id="email"
                      type="email"
                      v-model="form.email"
                      placeholder="marcsi@sze.hu"
                      required
                      :state="errors[0] ? false : valid ? true : null"
                    ></b-form-input>
                    <b-form-invalid-feedback>{{
                      errors[0]
                    }}</b-form-invalid-feedback>
                  </b-form-group>
                </ValidationProvider>

                <ValidationProvider
                  name="phone"
                  rules="required|phone"
                  v-slot="{ errors, valid }"
                >
                  <b-form-group
                    id="phonegroup"
                    label="*Gazdi telefonszáma:"
                    label-for="phone"
                    description=""
                    class="labels"
                  >
                    <b-form-input
                      id="phone"
                      v-model="form.phone"
                      placeholder="06301234897"
                      required
                      :state="errors[0] ? false : valid ? true : null"
                    ></b-form-input>
                    <b-form-invalid-feedback>{{
                      errors[0]
                    }}</b-form-invalid-feedback>
                  </b-form-group>
                </ValidationProvider>

                <ValidationProvider
                  name="pet"
                  rules="required"
                  v-slot="{ errors, valid }"
                >
                  <b-form-group
                    id="petgroup"
                    label="*Kisállat neve:"
                    label-for="pet"
                    description=""
                    class="labels"
                  >
                    <b-form-input
                      id="pet"
                      v-model="form.pet"
                      required
                      :state="errors[0] ? false : valid ? true : null"
                    ></b-form-input>
                    <b-form-invalid-feedback>{{
                      errors[0]
                    }}</b-form-invalid-feedback>
                  </b-form-group>
                </ValidationProvider>

                <ValidationProvider
                  name="animaltype"
                  rules="required"
                  v-slot="{ errors, valid }"
                >
                  <b-form-group
                    id="typegroup"
                    label="*Kisállat fajtája:"
                    label-for="type"
                    class="labels"
                  >
                    <b-form-select
                      id="type"
                      v-model="form.animaltype"
                      :options="animal"
                      class="form-control"
                      :state="errors[0] ? false : valid ? true : null"
                    ></b-form-select>
                    <b-form-invalid-feedback>{{
                      errors[0]
                    }}</b-form-invalid-feedback>
                  </b-form-group>
                </ValidationProvider>

                <div v-if="form.animaltype == null">
                  <b-form-group
                    id="servicegroup"
                    label="*Kívánt szolgáltatás:"
                    label-for="service0"
                    class="labels"
                  >
                    <b-form-select
                      id="service0"
                      v-model="form.servicetype"
                      class="form-control"
                    >
                      <b-form-select-option value="none" disabled
                        >Kérlek válassz fajtát!</b-form-select-option
                      >
                    </b-form-select>
                  </b-form-group>
                </div>

                <div v-else-if="form.animaltype == 'a1'">
                  <ValidationProvider
                    name="serviceType"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="servicegroup"
                      label="*Kívánt szolgáltatás:"
                      label-for="service1"
                      class="labels"
                    >
                      <b-form-select
                        id="service1"
                        v-model="form.servicetype"
                        class="form-control"
                        :options="services"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                  <ValidationProvider
                    name="length"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="lengthgroup"
                      label="*Szőr hosszúság:"
                      label-for="length"
                      class="labels"
                    >
                      <b-form-select
                        id="length"
                        v-model="form.length"
                        class="form-control"
                        :options="furLengths"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                  <ValidationProvider
                    name="dogsize"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="dogsizegroup"
                      label="*Kutya mérete:"
                      label-for="dogsize"
                      class="labels"
                    >
                      <b-form-select
                        id="dogsize"
                        v-model="form.dogsize"
                        class="form-control"
                        :options="dogSizes"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                </div>

                <div v-else-if="form.animaltype == 'a2'">
                  <ValidationProvider
                    name="servicetype"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="servicegroup"
                      label="*Kívánt szolgáltatás:"
                      label-for="service1"
                      class="labels"
                    >
                      <b-form-select
                        id="service1"
                        v-model="form.servicetype"
                        class="form-control"
                        :options="services"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                  <ValidationProvider
                    name="length"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="lengthgroup"
                      label="*Szőr hosszúság:"
                      label-for="length"
                      class="labels"
                    >
                      <b-form-select
                        id="length"
                        v-model="form.length"
                        class="form-control"
                        :options="furLengths"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                  <ValidationProvider
                    name="dogsize"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="dogsizegroup"
                      label="*Macska mérete:"
                      label-for="dogsize"
                      class="labels"
                    >
                      <b-form-select
                        id="dogsize"
                        v-model="form.dogsize"
                        class="form-control"
                        :options="size"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                </div>
                <div v-else>
                  <ValidationProvider
                    name="servicetype"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="servicegroup"
                      label="*Kívánt szolgáltatás:"
                      label-for="service1"
                      class="labels"
                    >
                      <b-form-select
                        id="service1"
                        v-model="form.servicetype"
                        class="form-control"
                        :options="servicessmall"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                  <ValidationProvider
                    name="servicetype"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="lengthgroup"
                      label="*Szőr hosszúság:"
                      label-for="length"
                      class="labels"
                    >
                      <b-form-select
                        id="length"
                        v-model="form.length"
                        class="form-control"
                        :options="fursmall"
                        :state="errors[0] ? false : valid ? true : null"
                      ></b-form-select>
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                  <ValidationProvider
                    name="servicetype"
                    rules="required"
                    v-slot="{ errors, valid }"
                  >
                    <b-form-group
                      id="dogsizegroup"
                      label="*Kisállat mérete:"
                      label-for="dogsize"
                      class="labels"
                    >
                      <b-form-select
                        id="dogsize"
                        v-model="form.dogsize"
                        class="form-control"
                        :state="errors[0] ? false : valid ? true : null"
                      >
                        <b-form-select-option value="o"
                          >Nem releváns</b-form-select-option
                        ></b-form-select
                      >
                      <b-form-invalid-feedback>{{
                        errors[0]
                      }}</b-form-invalid-feedback>
                    </b-form-group>
                  </ValidationProvider>
                </div>
              </b-form>
            </ValidationObserver>

            <b-card
              style="color: #5c002e;"
              title="*Kérlek válassz időpontot"
              class="mt-4"
            >
              <b-row class="mt-4">
                <b-col md="12" xl="6" class="picker">
                  <date-picker
                    v-model="form.selectedDate"
                    valueType="format"
                    type="date"
                    :inline="true"
                    format="Y-MM-DD"
                    :default-value="new Date()"
                    :disabled-date="getDisabledDates"
                  ></date-picker>
                </b-col>
                <b-col md="12" xl="6" class="picker mt-2 mt-xl-0">
                  <date-picker
                    type="time"
                    valueType="format"
                    :inline="true"
                    v-model="form.selectedTime"
                    :time-picker-options="timePickerOptions"
                    format="HH:mm"
                  ></date-picker>
                </b-col>
              </b-row>
            </b-card>
          </div>
        </b-col>

        <b-col>
          <div class="card card-1">
            <div class="row">
              <div class="col-12">
                <b-card
                  no-body
                  style="text-align: left"
                  class="overflow-hidden"
                >
                  <b-row no-gutters>
                    <b-col md="5">
                      <b-card-img
                        :src="sideimage"
                        style="object-fit: cover; width: 100%; height: 100%;"
                        alt="Image"
                        class="rounded-0 side-image"
                      ></b-card-img>
                    </b-col>
                    <b-col md="7">
                      <b-card-body style="color: #5c002e;">
                        <b-card-title>Foglalás részletei</b-card-title>
                        <b-card-sub-title class="mb-2" style="color: #5c002e;"
                          >Kérlek véglegesítés előtt ellenőrizd
                          adataidat</b-card-sub-title
                        >
                      </b-card-body>
                      <b-list-group flush>
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Név: </strong
                          >{{ form.name }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>E-mail cím: </strong
                          >{{ form.email }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Telefonszám: </strong
                          >{{ form.phone }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Kisállat neve: </strong
                          >{{ form.pet }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Kisállat fajtája: </strong
                          >{{
                            selectedAnimalType ? selectedAnimalType.text : null
                          }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Kiválasztott szolgáltatás: </strong
                          >{{
                            selectedServiceType
                              ? selectedServiceType.text
                              : null
                          }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Szőr hosszúság: </strong
                          >{{
                            selectedFurLength ? selectedFurLength.text : null
                          }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Méret: </strong
                          >{{
                            selectedDogSize ? selectedDogSize.text : null
                          }}</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Kezelés időtartama: </strong
                          >{{ treatmentDuration }} perc</b-list-group-item
                        >
                        <b-list-group-item class="custom-list-group-item"
                          ><strong>Választott dátum: </strong
                          >{{ form.selectedDate }}
                          {{ form.selectedTime }}</b-list-group-item
                        >
                      </b-list-group>

                      <b-card-body>
                        <hr />
                        <b-form-checkbox
                          id="checkbox-1"
                          v-model="form.gdprAccepted"
                          name="checkbox-1"
                          value="accepted"
                          unchecked-value="not_accepted"
                          class="custom-list-group-item"
                        >
                          Elfogadom az általános szerződési feltételekben és az
                          adatvédelmi nyilatkozatban foglaltakat.
                        </b-form-checkbox>

                        <button
                          class="btn btn-save mt-4"
                          type="submit"
                          @click="submitForm"
                        >
                          Időpont lefoglalása
                        </button>
                      </b-card-body>
                    </b-col>
                  </b-row>
                </b-card>
              </div>
            </div>
          </div>
        </b-col>
      </b-row>
    </b-container>
    <Footer />
  </div>
</template>

<script>
import HomePage from "./HomePage.vue";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
import _ from "lodash";
import Footer from "../components/Shared/Footer.vue";
import Bar from "../components/Shared/Bar.vue";

export default {
  name: "CosmeticsAppointment",

  components: {
    "date-picker": DatePicker,
    Footer,
    Bar
  },

  data() {
    return {
      treatmentDuration: null,
      form: {
        name: null,
        email: null,
        phone: null,
        pet: null,
        servicetype: null,
        animaltype: null,
        dogsize: null,
        length: null,
        selectedDate: null,
        selectedTime: null,
        gdprAccepted: "not_accepted"
      },
      timePickerOptions: {
        start: "08:30",
        step: "00:30",
        end: "18:30"
      },
      animal: [
        { value: "a1", text: "Kutya" },
        { value: "a2", text: "Macska" },
        { value: "a3", text: "Nyúl" },
        { value: "a4", text: "Tengerimalac" }
      ],

      services: [
        { value: "eu", text: "EÜ kezelés" },
        { value: "fn", text: "Fésülés, nyírás" },
        { value: "ffn", text: "Fürdetés, fésülés, nyírás" },
        { value: "kv", text: "Karomvágás" },
        { value: "full", text: "Teljes kozmetika" }
      ],

      servicessmall: [
        { value: "eu", text: "EÜ kezelés" },
        { value: "fn", text: "Fésülés, nyírás" },
        { value: "kv", text: "Karomvágás" },
        { value: "full", text: "Teljes kozmetika" }
      ],

      furLengths: [
        { value: 1, text: "Rövid" },
        { value: 2, text: "Félhosszú" },
        { value: 3, text: "Hosszú" }
      ],

      fursmall: [
        { value: 1, text: "Rövid" },
        { value: 3, text: "Hosszú" }
      ],

      dogSizes: [
        { value: "s", text: "Kis testű" },
        { value: "m", text: "Közepes testű" },
        { value: "l", text: "Nagy testű" }
      ],

      size: [{ value: "o", text: "Nem releváns" }],

      serviceDurations: {
        "kv-1-a3-o": 15,
        "kv-3-a3-o": 15,
        "fn-1-a3-o": 30,
        "fn-3-a3-o": 45,
        "eu-1-a3-o": 30,
        "eu-3-a3-o": 30,
        "full-1-a3-o": 60,
        "full-3-a3-o": 75,
        "kv-1-a4-o": 15,
        "kv-3-a4-o": 15,
        "fn-1-a4-o": 30,
        "fn-3-a4-o": 45,
        "eu-1-a4-o": 30,
        "eu-3-a4-o": 30,
        "full-1-a4-o": 60,
        "full-3-a4-o": 75,
        "fn-1-a2-o": 45,
        "fn-3-a2-o": 60,
        "eu-1-a2-o": 30,
        "eu-3-a2-o": 30,
        "ffn-1-a2-o": 60,
        "ffn-3-a2-o": 90,
        "kv-1-a2-o": 15,
        "kv-3-a2-o": 15,
        "full-1-a2-o": 90,
        "full-2-a2-o": 105,
        "full-3-a2-o": 120,
        "kv-1-a1-s": 15,
        "kv-2-a1-s": 15,
        "kv-3-a1-s": 15,
        "kv-1-a1-m": 15,
        "kv-2-a1-m": 15,
        "kv-3-a1-m": 15,
        "kv-1-a1-l": 15,
        "kv-2-a1-l": 15,
        "kv-3-a1-l": 15,
        "fn-1-a1-s": 30,
        "fn-2-a1-s": 45,
        "fn-3-a1-s": 60,
        "fn-1-a1-m": 45,
        "fn-2-a1-m": 60,
        "fn-3-a1-m": 75,
        "fn-1-a1-l": 45,
        "fn-2-a1-l": 60,
        "fn-3-a1-l": 90,
        "ffn-1-a1-s": 45,
        "ffn-2-a1-s": 60,
        "ffn-3-a1-s": 90,
        "ffn-1-a1-m": 60,
        "ffn-2-a1-m": 90,
        "ffn-3-a1-m": 120,
        "ffn-1-a1-l": 60,
        "ffn-2-a1-l": 90,
        "ffn-3-a1-l": 120,
        "eu-1-a1-s": 30,
        "eu-2-a1-s": 30,
        "eu-3-a1-s": 30,
        "eu-1-a1-m": 30,
        "eu-2-a1-m": 30,
        "eu-3-a1-m": 30,
        "eu-1-a1-l": 30,
        "eu-2-a1-l": 30,
        "eu-3-a1-l": 30,
        "full-1-a1-s": 60,
        "full-2-a1-s": 70,
        "full-3-a1-s": 90,
        "full-1-a1-m": 75,
        "full-2-a1-m": 90,
        "full-3-a1-m": 120,
        "full-1-a1-l": 90,
        "full-2-a1-l": 120,
        "full-3-a1-l": 150
      },
      sideimage: require("../assets/tutib-cosmetics-appointment-side-image.png")
    };
  },
  components: { HomePage, Footer, Bar },

  watch: {
    "form.length": {
      handler: function(newValue, oldValue) {
        this.calculateTreatmentDuration();
      },
      deep: true,
      immediate: true
    },
    "form.dogsize": {
      handler: function(newValue, oldValue) {
        this.calculateTreatmentDuration();
      },
      deep: true,
      immediate: true
    },
    "form.servicetype": {
      handler: function(newValue, oldValue) {
        this.calculateTreatmentDuration();
      },
      deep: true,
      immediate: true
    },
    "form.animaltype": {
      handler: function(newValue, oldValue) {
        this.calculateTreatmentDuration();
      },
      deep: true,
      immediate: true
    }
  },
  methods: {
    calculateTreatmentDuration() {
      const key = `${this.form.servicetype}-${this.form.length}-${this.form.animaltype}-${this.form.dogsize}`;
      this.treatmentDuration = this.serviceDurations[key] || null;

      if (this.treatmentDuration !== null) {
        this.form.selectedDate = null;
        this.form.selectedTime = null;

        this.timePickerOptions.step = `0${this.treatmentDuration / 60}:${this
          .treatmentDuration % 60}`;
      }
    },

    getDisabledDates(date) {
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      return (
        date <= today ||
        date > new Date(today.getTime() + 30 * 24 * 3600 * 1000)
      );
    },
    async submitForm(e) {
      e.preventDefault();

      const myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");
      myHeaders.append("Accept", "application/json");

      const raw = JSON.stringify(this.form);

      const requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow"
      };

      const response = await fetch(
        "http://localhost:81/cosmetics-appointment",
        requestOptions
      );

      if (response.ok) {
        const jsonData = await response.json();
        this.$swal({
          icon: "success",
          title: "Sikeres időpontfoglalás!",
          text: "Szeretettel várunk a kiválasztott időpontban!"
        });

        this.form = {
          name: null,
          email: null,
          phone: null,
          pet: null,
          servicetype: null,
          animaltype: null,
          dogsize: null,
          length: null,
          selectedDate: null,
          selectedTime: null,
          gdprAccepted: "not_accepted"
        };
      } else {
        if (response.status == 422) {
          let validationErrors = await response.json();
          let html = ``;

          for (const [key, value] of Object.entries(validationErrors)) {
            html += `<li>${value[0]}</li>`;
          }

          this.$swal({
            icon: "error",
            title: "Hibás adatok!",
            html: html,
            footer: "Kérlek ellenőrizd az alábbi hibákat beküldés előtt!"
          });
        }
      }
    }
  },

  computed: {
    selectedAnimalType() {
      return _.find(this.animal, o => o.value == this.form.animaltype);
    },

    selectedServiceType() {
      return _.find(this.services, o => o.value === this.form.servicetype);
    },

    selectedFurLength() {
      return _.find(this.furLengths, o => o.value === this.form.length);
    },

    selectedDogSize() {
      return _.find(this.dogSizes, o => o.value === this.form.dogsize);
    }
  }
};
</script>

<style scoped>
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

@media screen and (min-width: 992px) and (max-width: 1200px) {
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
    flex-direction: column;
  }

  .side-image {
    max-height: 250px;
  }
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

.custom-list-group-item {
  color: #5c002e;
}
</style>
