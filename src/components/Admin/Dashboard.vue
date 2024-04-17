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
              <cosmetics-appointments />
            </b-card>
          </b-tab>
          <b-tab title="Panzió" :title-link-class="linkClass(1)">
            <b-card class="table-responsive">
              <pet-hotel-reservations />
            </b-card>
          </b-tab>
        </b-tabs>
      </b-card>
    </b-container>
  </div>
</template>

<script>
import * as _ from "lodash";
import PetHotelReservations from "./Components/PetHotelReservations.vue";
import CosmeticsAppointments from "./Components/CosmeticsAppointments.vue";
export default {
  name: "Dashboard",

  components: {
    PetHotelReservations,
    CosmeticsAppointments
  },

  data() {
    return {
      tabIndex: 0,      
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
    },

    
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
