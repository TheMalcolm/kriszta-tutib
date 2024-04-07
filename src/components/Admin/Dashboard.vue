<template>
  <div>
    <header style="background-color: #F0A8CC20">
      <div class="container">
        <b-navbar toggleable="lg" variant="info">
          <b-navbar-brand class="logo" style="color:#5c002e" href="/">
            Tuti-Bunda Kutyakozmetika és Panzió
          </b-navbar-brand>

          <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

          <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
            <b-navbar-nav> </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav pills class="ml-auto " style="color: #5c002e;">
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'HomePage' }"
                  >Kijelentkezés</router-link
                >
              </b-nav-item>
            </b-navbar-nav>
          </b-collapse>
        </b-navbar>
      </div>
    </header>

    <div>
      <b-jumbotron
        header="Foglalásaink"
        style="color: #5c002e; padding-top: 20px; font-family: Crimson Pro, serif;"
      >
      </b-jumbotron>
    </div>

    <b-container>
      <b-card
        style="border: none; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);background-color: #F0A8CC20;border-radius: 15px;"
      >
        <b-tabs content-class="" v-model="tabIndex">
          <b-tab title="Kozmetika" :title-link-class="linkClass(0)">
            <b-card class="table-responsive">
              <h3 style="color: #5c002e; margin-bottom: 0px;">Kozmetika</h3>
              <b-form-group
                label=""
                label-for="filter-input"
                label-cols-sm="3"
                label-align-sm="right"
                label-size="sm"
                class="mb-3 col-10 col-sm-8"
              >
                <b-input-group size="sm">
                  <b-form-input
                    id="filter-input"
                    v-model="filter1"
                    type="text"
                    placeholder="Keresés..."
                    style="margin-right: 8px;"
                  ></b-form-input>

                  <b-input-group-append>
                    <b-button size="sm" :disabled="!filter" @click="filter = ''"
                      ><b-icon-x-square
                    /></b-button>
                  </b-input-group-append>
                </b-input-group>
              </b-form-group>

              <b-tabs content-class="mt-3">
                <b-tab
                  :title="typeof items[0] !== 'undefined' ? items[0].date : ''"
                  v-for="(items, date) in kozm"
                  :key="date"
                >
                  <b-table
                    id="cosmetic"
                    hover
                    small
                    sticky-header
                    :filter="filter1"
                    :fields="fields1"
                    :items="items"
                    :per-page="perPage"
                    :current-page="currentPage"
                  >
                    <template #head(date)="data">
                      <span class="table-head">{{ data.label }}</span>
                    </template>
                    <template #head(petname)="data">
                      <span class="table-head">{{ data.label }}</span>
                    </template>
                    <template #head(service)="data">
                      <span class="table-head">{{ data.label }}</span>
                    </template>
                    <template #head(name)="data">
                      <span class="table-head">{{ data.label }}</span>
                    </template>
                    <template #head(pettype)="data">
                      <span class="table-head">{{ data.label }}</span>
                    </template>
                    <template #cell(date)="row">
                      <span class="rowdata">{{ row.item.date }}</span>
                    </template>
                    <template #cell(time)="row">
                      <span class="rowdata">{{ row.item.time }}</span>
                    </template>

                    <template #cell(petname)="row">
                      <span class="rowdata">{{ row.item.petname }}</span>
                    </template>
                    <template #cell(pettype)="row">
                      <span class="rowdata">{{
                        formatAnimal(row.item.pettype)
                      }}</span>
                    </template>
                    <template #cell(service)="row">
                      <span class="rowdata">{{
                        formatService(row.item.service)
                      }}</span>
                    </template>
                    <template #cell(actions)="row" class="d-block">
                      <b-button
                        size="sm"
                        @click="openModal1(row.item)"
                        class="mr-1 btn-info"
                      >
                        <b-icon-info-circle />
                      </b-button>

                      <b-button size="sm" @click="showMsgBoxTwo"
                        ><b-icon-trash
                      /></b-button>
                    </template>
                  </b-table>

                  <b-pagination
                    v-model="currentPage"
                    :total-rows="totalItemsKozm"
                    :per-page="perPage"
                    aria-controls="cosmetic"
                    hide-ellipsis
                    variant="primary"
                  ></b-pagination>
                </b-tab>
              </b-tabs>
            </b-card>
          </b-tab>
          <b-tab title="Panzió" :title-link-class="linkClass(1)">
            <b-card class="table-responsive">
              <h3 style="color: #5c002e;">Panzió</h3>
              <b-form-group
                label=""
                label-for="filter-input"
                label-cols-sm="3"
                label-align-sm="right"
                label-size="sm"
                class="mb-3 col-10 col-sm-8"
              >
                <b-input-group size="sm">
                  <b-form-input
                    id="filter-input"
                    v-model="filter2"
                    type="text"
                    placeholder="Keresés..."
                    style="margin-right: 8px;"
                  ></b-form-input>

                  <b-input-group-append>
                    <b-button size="sm" :disabled="!filter" @click="filter = ''"
                      ><b-icon-x-square
                    /></b-button>
                  </b-input-group-append>
                </b-input-group>
              </b-form-group>
              <b-table
                id="boarding"
                hover
                small
                :filter="filter2"
                sticky-header
                :fields="fields2"
                :items="filteredPanz"
                :per-page="perPage"
                :current-page="currentPage"
              >
                <template #head(arrival)="data">
                  <span class="table-head">{{ data.label }}</span>
                </template>
                <template #head(departure)="data">
                  <span class="table-head">{{ data.label }}</span>
                </template>
                <template #head(count)="data">
                  <span class="table-head">{{ data.label }}</span>
                </template>
                <template #cell(arrival)="row">
                  <span class="rowdata">{{
                    formatDate(row.item.arrival)
                  }}</span>
                </template>
                <template #cell(departure)="row">
                  <span class="rowdata">{{
                    formatDate(row.item.departure)
                  }}</span>
                </template>
                <template #cell(count)="row">
                  <span class="rowdata">{{ row.item.count }}</span>
                </template>

                <template #cell(actions)="row" class="d-block">
                  <b-button
                    size="sm"
                    @click="openModal2(row.item)"
                    class="mr-1 btn-info"
                  >
                    <b-icon-info-circle />
                  </b-button>

                  <b-button size="sm" @click="showMsgBoxTwo"
                    ><b-icon-trash
                  /></b-button>
                </template>
              </b-table>

              <b-pagination
                v-model="currentPage"
                :total-rows="totalItemsPanz"
                :per-page="perPage"
                aria-controls="boarding"
                hide-ellipsis
                variant="primary"
              ></b-pagination>
            </b-card>
          </b-tab>
        </b-tabs>
      </b-card>
    </b-container>

    <b-modal v-if="selectedItem1" v-model="showModalinfo1">
      <template #modal-header>
        <p style="color: #5c002e; font-size: larger;">
          {{ selectedItem1.date }} {{ selectedItem1.time }}
        </p>
      </template>
      <template #modal-footer="{close}">
        <b-button size="sm" @click="cancel()">Bezárás</b-button>
      </template>

      <h3 class="datatitle">Gazdi adatai:</h3>
      <p class="datasmall"><strong>Név: </strong>{{ selectedItem1.name }}</p>
      <p class="datasmall">
        <strong>E-mail:</strong> {{ selectedItem1.email }}
      </p>
      <p class="datasmall">
        <strong>Telefonszám:</strong> {{ selectedItem1.phone }}
      </p>
      <h3 class="datatitle">Kisállat adatai:</h3>
      <p class="datasmall">
        <strong>Kisállat neve:</strong> {{ selectedItem1.petname }}
      </p>
      <p class="datasmall">
        <strong>Fajta: </strong>{{ formatAnimal(selectedItem1.pettype) }}
      </p>
      <p class="datasmall">
        <strong>Szolgáltatás: </strong
        >{{ formatService(selectedItem1.service) }}
      </p>
      <p class="datasmall">
        <strong>Szőr hosszúsága: </strong>{{ formatFur(selectedItem1.fur) }}
      </p>
      <p class="datasmall">
        <strong>Kisállat mérete:</strong> {{ formatSize(selectedItem1.size) }}
      </p>
    </b-modal>
    <b-modal v-if="selectedItem2" v-model="showModalinfo2">
      <template #modal-header>
        <p style="color: #5c002e; font-size: larger;">
          <strong>Foglalás részletei</strong>
        </p>
      </template>
      <template #modal-footer="{close}">
        <b-button size="sm" @click="cancel()">Bezárás</b-button>
      </template>
      <p class="datasmall">
        <strong>Érkezés: </strong>{{ formatDate(selectedItem2.arrival) }}
      </p>
      <p class="datasmall">
        <strong>Távozás: </strong>{{ formatDate(selectedItem2.departure) }}
      </p>
      <p class="datasmall">
        <strong>Tartózkodás ideje: </strong
        >{{ calculateDays(selectedItem2.arrival, selectedItem2.departure) }} nap
      </p>
      <h3 class="datatitle">Gazdi adatai:</h3>
      <p class="datasmall"><strong>Név: </strong>{{ selectedItem2.name }}</p>
      <p class="datasmall">
        <strong>E-mail:</strong> {{ selectedItem2.email }}
      </p>
      <p class="datasmall">
        <strong>Telefonszám:</strong> {{ selectedItem2.phone }}
      </p>
      <h3 v-if="selectedItem2.dogs.length === 1" class="datatitle">
        Kutyus adatai:
      </h3>
      <h3 v-else class="datatitle">Kutyusok adatai:</h3>
      <div v-for="(dog, index) in selectedItem2.dogs" :key="index">
        <h4 style="color: #5c002e;">{{ dog.name }}</h4>
        <p class="datasmall"><strong>Kutyus fajtája:</strong> {{ dog.type }}</p>
        <p class="datasmall">
          <strong>Teljes kozmetika: </strong>
          <span v-if="dog.extraFeatures.cosmetics"
            ><b-icon-patch-check-fill variant="success"
          /></span>
          <span v-else> <b-icon-patch-minus-fill variant="danger"/></span>
        </p>
        <p class="datasmall">
          <strong>Extra hosszú séta: </strong>
          <span v-if="dog.extraFeatures.extraLongWalking"
            ><b-icon-patch-check-fill variant="success"
          /></span>
          <span v-else> <b-icon-patch-minus-fill variant="danger"/></span>
        </p>

        <p class="datasmall">
          <strong>Fizioterápia: </strong>
          <span v-if="dog.extraFeatures.physiotherapy"
            ><b-icon-patch-check-fill variant="success"
          /></span>
          <span v-else> <b-icon-patch-minus-fill variant="danger"/></span>
        </p>
        <p class="datasmall">
          <strong>Megjegyzések: </strong>
          <span v-if="dog.comments">{{ dog.comments }}</span
          ><span v-else>-</span>
        </p>
        <hr style="color:#5c002e" />
      </div>
    </b-modal>
  </div>
</template>

<script>
import * as _ from "lodash";
export default {
  name: "Dashboard",

  data() {
    return {
      perPage: 6,
      currentPage: 1,
      totalItemsKozm: 0,
      totalItemsPanz: 0,
      fields1: [
        {
          key: "date",
          label: "Érkezés"
        },
        {
          key: "time",
          label: ""
        },
        {
          key: "name",
          label: "Gazdi neve"
        },
        {
          key: "petname",
          label: "Kisállat neve"
        },
        {
          key: "pettype",
          label: "Fajta",
          filterByFormatted: true
        },
        {
          key: "service",
          label: "Szolgáltatás",
          formatter: (value, key, item) => {
            return this.formatService(item);
          },
          filterByFormatted: true
        },
        {
          key: "actions",
          label: ""
        }
      ],
      fields2: [
        {
          key: "arrival",
          label: "Érkezés"
        },
        {
          key: "departure",
          label: "Távozás"
        },
        {
          key: "count",
          label: "Kutyusok száma"
        },
        {
          key: "actions",
          label: ""
        }
      ],
      kozm: [
        {
          id: 1,
          date: "2023.10.25.",
          time: "13:30",
          petname: "Lajcsika",
          pettype: "a1",
          service: "eu",
          fur: "2",
          size: "l",
          name: "Polgár Kata",
          email: "kata@kata.hu",
          phone: "+36705589313"
        },
        {
          id: 2,
          date: "2023.10.25.",
          time: "14:00",
          petname: "Elemér",
          pettype: "a4",
          service: "kv",
          fur: "1",
          size: "o",
          name: "Pál Attila",
          email: "attila@attila.hu",
          phone: "+36705589313"
        },
        {
          id: 3,
          date: "2023.10.26.",
          time: "10:00",
          petname: "Bodri",
          pettype: "a1",
          service: "fn",
          fur: "1",
          size: "s",
          name: "Kovács Béla",
          email: "bela@kovacs.hu",
          phone: "+36705589314"
        },
        {
          id: 4,
          date: "2023.10.26.",
          time: "11:30",
          petname: "Cirmi",
          pettype: "a2",
          service: "kv",
          fur: "3",
          size: "o",
          name: "Szabó Piroska",
          email: "piroska@szabo.hu",
          phone: "+36705589315"
        },
        {
          id: 5,
          date: "2023.10.27.",
          time: "09:00",
          petname: "Füles",
          pettype: "a3",
          service: "eu",
          fur: "2",
          size: "o",
          name: "Nagy János",
          email: "janos@nagy.hu",
          phone: "+36705589316"
        },
        {
          id: 6,
          date: "2023.10.27.",
          time: "14:30",
          petname: "Pöttyös",
          pettype: "a4",
          service: "full",
          fur: "1",
          size: "o",
          name: "Tóth Anna",
          email: "anna@toth.hu",
          phone: "+36705589317"
        },
        {
          id: 7,
          date: "2023.10.28.",
          time: "10:30",
          petname: "Mancs",
          pettype: "a1",
          service: "fn",
          fur: "3",
          size: "l",
          name: "Kiss Péter",
          email: "peter@kiss.hu",
          phone: "+36705589318"
        },
        {
          id: 8,
          date: "2023.10.28.",
          time: "15:00",
          petname: "Cicó",
          pettype: "a2",
          service: "kv",
          fur: "2",
          size: "o",
          name: "Varga Mária",
          email: "maria@varga.hu",
          phone: "+36705589319"
        }
      ],
      panz: [
        {
          id: 1,
          arrival: "Tue Oct 31 2023 00:00:00 GMT+0100",
          departure: "Sat Nov 04 2023 00:00:00 GMT+0100",
          count: "2",
          name: "Halas Mária",
          phone: "06702557393",
          email: "marika@gmail.com",
          dogs: [
            {
              id: 1,
              name: "Marcika",
              type: "Labrador",
              extraFeatures: {
                cosmetics: false,
                extraLongWalking: true,
                physiotherapy: false
              },
              comments: ""
            },
            {
              id: 1,
              name: "Maja",
              type: "Csivava",
              extraFeatures: {
                cosmetics: false,
                extraLongWalking: false,
                physiotherapy: true
              },
              comments: ""
            }
          ]
        },
        {
          id: 2,
          arrival: "Mon Nov 06 2023 00:00:00 GMT+0100",
          departure: "Fri Nov 09 2023 00:00:00 GMT+0100",
          count: "1",
          name: "Kovács János",
          phone: "06701234567",
          email: "janos@gmail.com",
          dogs: [
            {
              id: 1,
              name: "Bodri",
              type: "Golden Retriever",
              extraFeatures: {
                cosmetics: true,
                extraLongWalking: false,
                physiotherapy: false
              },
              comments: ""
            }
          ]
        },
        {
          id: 3,
          arrival: "Mon Nov 13 2023 00:00:00 GMT+0100",
          departure: "Fri Nov 19 2023 00:00:00 GMT+0100",
          count: "1",
          name: "Szabó Péter",
          phone: "06709876543",
          email: "peter@gmail.com",
          dogs: [
            {
              id: 1,
              name: "Foltos",
              type: "Dalmata",
              extraFeatures: {
                cosmetics: true,
                extraLongWalking: false,
                physiotherapy: true
              },
              comments: ""
            }
          ]
        },
        {
          id: 4,
          arrival: "Wed Nov 22 2023 00:00:00 GMT+0100",
          departure: "Sun Nov 30 2023 00:00:00 GMT+0100",
          count: "2",
          name: "Nagy Anna",
          phone: "06701239876",
          email: "anna@gmail.com",
          dogs: [
            {
              id: 1,
              name: "Morzsi",
              type: "Yorkshire Terrier",
              extraFeatures: {
                cosmetics: false,
                extraLongWalking: true,
                physiotherapy: false
              },
              comments: ""
            },
            {
              id: 2,
              name: "Bodri",
              type: "Golden Retriever",
              extraFeatures: {
                cosmetics: true,
                extraLongWalking: false,
                physiotherapy: true
              },
              comments: ""
            }
          ]
        },
        {
          id: 7,
          arrival: "Mon Dec 20 2023 00:00:00 GMT+0100",
          departure: "Fri Dec 24 2023 00:00:00 GMT+0100",
          count: "1",
          name: "Tóth László",
          phone: "06706543218",
          email: "laszlo@gmail.com",
          dogs: [
            {
              id: 1,
              name: "Bodza",
              type: "Németjuhász",
              extraFeatures: {
                cosmetics: true,
                extraLongWalking: false,
                physiotherapy: true
              },
              comments: ""
            }
          ]
        },
        {
          id: 8,
          arrival: "Wed Dec 27 2023 00:00:00 GMT+0100",
          departure: "Sun Dec 31 2023 00:00:00 GMT+0100",
          count: "2",
          name: "Varga Mária",
          phone: "06709871235",
          email: "vargamaria@gmail.com",
          dogs: [
            {
              id: 1,
              name: "Füles",
              type: "Beagle",
              extraFeatures: {
                cosmetics: false,
                extraLongWalking: true,
                physiotherapy: false
              },
              comments: ""
            },
            {
              id: 2,
              name: "Karamel",
              type: "Németjuhász",
              extraFeatures: {
                cosmetics: true,
                extraLongWalking: false,
                physiotherapy: true
              },
              comments: ""
            }
          ]
        }
      ],
      showModalinfo1: false,
      showModalinfo2: false,
      selectedItem1: null,
      selectedItem2: null,
      serviceCodes: {
        eu: "EÜ kezelés",
        fn: "Fésülés, nyírás",
        ffn: "Fürdetés, fésülés, nyírás",
        kv: "Karomvágás",
        full: "Teljes kozmetika"
      },
      furCodes: {
        1: "Rövid",
        2: "Közepes",
        3: "Hosszú"
      },
      animalCodes: {
        a1: "Kutya",
        a2: "Macska",
        a3: "Nyúl",
        a4: "Tengerimalac"
      },
      sizeCodes: {
        s: "Kis testű",
        m: "Közepes testű",
        l: "Nagy testű",
        o: "Nem releváns"
      },
      filter1: "",
      filter2: "",
      filter: null,
      tabIndex: 0
    };
  },
  methods: {
    linkClass(idx) {
      if (this.tabIndex === idx) {
        return ["activetab"];
      } else {
        return ["text-dark"];
      }
    },
    openModal1(item) {
      this.selectedItem1 = item;
      this.showModalinfo1 = true;
    },
    openModal2(item) {
      this.selectedItem2 = item;
      this.showModalinfo2 = true;
    },
    formatDate(item) {
      let date = new Date(item);
      return `${date.getFullYear()}.${("0" + (date.getMonth() + 1)).slice(
        -2
      )}.${("0" + date.getDate()).slice(-2)}.`;
    },
    calculateDays(arrival, departure) {
      let arrivalDate = new Date(arrival);
      let departureDate = new Date(departure);
      let differenceInTime = departureDate.getTime() - arrivalDate.getTime();
      let differenceInDays = Math.round(differenceInTime / (1000 * 3600 * 24));
      return differenceInDays;
    },
    formatService(code) {
      return this.serviceCodes[code] || code;
    },
    formatFur(code) {
      return this.furCodes[code] || code;
    },
    formatSize(code) {
      return this.sizeCodes[code] || code;
    },
    formatAnimal(code) {
      return this.animalCodes[code] || code;
    },
    cancel() {
      this.showModalinfo1 = false;
      this.showModalinfo2 = false;
    },
    showMsgBoxTwo() {
      this.boxTwo = "";
      this.$bvModal
        .msgBoxConfirm("Biztosan törölni szeretnéd ezt a foglalást?", {
          title: "Foglalás törlése",
          size: "sm",
          buttonSize: "sm",
          okVariant: "danger",
          okTitle: "Igen",
          cancelTitle: "Nem",
          footerClass: "p-2",
          hideHeaderClose: true,
          centered: true
        })
        .then(value => {
          this.boxTwo = value;
        })
        .catch(err => {
          // An error occurred
        });
    },
    sortObject(obj) {
      return Object.keys(obj)
        .sort()
        .reduce(function(result, key) {
          result[key] = obj[key];
          return result;
        }, {});
    }
  },
  computed: {
    filteredKozm() {
      if (!this.filter) {
        return this.kozm;
      }
      return this.kozm.filter(item =>
        Object.values(item).some(val =>
          val
            .toString()
            .toLowerCase()
            .includes(this.filter.toLowerCase())
        )
      );
    },
    filteredPanz() {
      if (!this.filter) {
        return this.panz;
      }
      return this.panz.filter(item =>
        Object.values(item).some(val =>
          val
            .toString()
            .toLowerCase()
            .includes(this.filter.toLowerCase())
        )
      );
    }
  },
  mounted() {
    this.kozm = Object.values(this.sortObject(_.groupBy(this.kozm, "date")));

    this.totalItemsKozm = this.filteredKozm.length;
    this.totalItemsPanz = this.filteredPanz.length;
  }
};
</script>

<style scoped>
.bg-info {
  background-color: transparent !important;
}

.activetab {
  color: #5c002e;
}

.pagination-custom a {
  color: #5c002e;
}
.nav-btn {
  text-decoration: none;
  color: white;
  transition: color 0.5s, font-size 0.5s;
  font-size: medium;
  background-color: #5c002e;
  padding: 10px;
  border-radius: 33px;
}

.nav-btn:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
}

.pagination {
  --bs-pagination-active-bg: #5c002e;
  --bs-pagination-active-border-color: #5c002e;
  --bs-pagination-color: #5c002e;
  --bs-pagination-focus-box-shadow: 0 0 0 0.25rem #f6cdd1;
}

.btn-toggle {
  background-color: #5c002e;
  border-radius: 33px;
  color: #ffffff;
  border: 0px;
  text-decoration: none;
  margin-right: 10px;
}

.table-responsive {
  border: none;
}

.table-head {
  color: #5c002e;
  font-family: Crimson Pro, serif;
  font-size: larger;
}

.btn-toggle:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
}

.btn-info {
  background-color: #5c002e;
  color: #ffffff;
  border: none;
}

.btn-info:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
}

.datatitle {
  font-family: Crimson Pro, serif;
  color: #5c002e;
}

.datasmall {
  color: #5c002e;
}

.rowdata {
  color: #5c002e;
}
@media only screen and (max-width: 768px) {
  .table-responsive {
    overflow-x: auto;
    white-space: nowrap;
  }
}

@media screen and (max-width: 426px) {
  .logo {
    font-size: smaller;
  }
}
@media screen and (max-width: 329px) {
  .logo {
    font-size: x-small;
  }
}
</style>
