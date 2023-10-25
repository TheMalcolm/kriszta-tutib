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
        <div class="mb-3">
          <b-button v-b-toggle.collapse-1 class="btn-toggle">
            Kozmetika
          </b-button>
          <b-button v-b-toggle.collapse-2 class="btn-toggle">
            Panzió
          </b-button>
        </div>

        <b-collapse visible col="12" id="collapse-1">
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
                  v-model="filter"
                  type="search"
                  placeholder="Type to Search"
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
              hover
              small
              sticky-header
              :fields="fields"
              :items="filteredKozm"
            >
              <template #cell(actions)="row" class="d-block">
                <b-button size="sm" @click="openModal(row.item)" class="mr-1">
                  <b-icon-info-circle />
                </b-button>
                <b-button size="sm"><b-icon-pencil-square /></b-button>
                <b-button size="sm"><b-icon-trash /></b-button>
              </template>
              <template #cell(service)="row">
                <span>{{ formatService(row.item.service) }}</span>
              </template>
            </b-table>
          </b-card>
        </b-collapse>
        <b-collapse col="12" id="collapse-2">
          <b-card>
            <h3 style="color: #5c002e;">Panzió</h3>
            <b-table striped hover :items="panz"></b-table>
          </b-card>
        </b-collapse>
      </b-card>
    </b-container>

    <b-modal v-if="selectedItem" v-model="showModal">
      <template #modal-title> {{ selectedItem.petname }} Details </template>
      <p>ID: {{ selectedItem.id }}</p>
      <p>Érkezés: {{ selectedItem.time }}</p>
      <p>Kisállat neve: {{ selectedItem.petname }}</p>
      <p>Fajta: {{ selectedItem.pettype }}</p>
      <p>Szolgáltatás: {{ formatService(selectedItem.service) }}</p>
    </b-modal>
  </div>
</template>

<script>
export default {
  name: "Dashboard",

  data() {
    return {
      fields: [
        {
          key: "date",
          label: "Érkezés"
        },
        {
          key: "time",
          label: ""
        },
        {
          key: "petname",
          label: "Kisállat neve"
        },
        {
          key: "pettype",
          label: "Fajta"
        },
        {
          key: "service",
          label: "Szolgáltatás"
        },
        {
          key: "actions",
          label: ""
        }
      ],

      kozm: [
        {
          id: 1,
          date: "2023.10.26.",
          time: "13:30",
          petname: "Lajcsika",
          pettype: "Kutya",
          service: "eu"
        },
        {
          id: 1,
          date: "2023.10.25.",
          time: "13:30",
          petname: "Lajcsika",
          pettype: "Kutya",
          service: "eu"
        },
        {
          id: 1,
          date: "2023.10.25.",
          time: "13:30",
          petname: "Lajcsika",
          pettype: "Kutya",
          service: "eu"
        },
        {
          id: 1,
          date: "2023.10.25.",
          time: "15:30",
          petname: "Lajcsika",
          pettype: "Kutya",
          service: "eu"
        },
        {
          id: 1,
          date: "2023.10.25.",
          time: "14:30",
          petname: "Lajcsika",
          pettype: "Kutya",
          service: "eu"
        }
      ],
      showModal: false,
      selectedItem: null,
      serviceCodes: {
        eu: "EÜ kezelés",
        fn: "Fésülés, nyírás",
        ffn: "Fürdetés, fésülés, nyírás",
        kv: "Karomvágás",
        full: "Teljes kozmetika"
      },
      filter: ""
    };
  },
  methods: {
    openModal(item) {
      this.selectedItem = item;
      this.showModal = true;
    },
    formatService(code) {
      return this.serviceCodes[code] || code;
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
    }
  }
};
</script>

<style scoped>
.bg-info {
  background-color: transparent !important;
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

.btn-toggle:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
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
