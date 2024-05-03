<template>
  <div>
    <h3 style="color: #5c002e; margin-bottom: 0px;">Kozmetika</h3>

    <b-tabs content-class="mt-3" v-if="cosmeticsAppointments">
      <b-tab
        :title="date"
        v-for="(items, date) in cosmeticsAppointments.data"
        :key="date"
        :title-link-class="linkClass(0)"
      >
        <b-table
          id="cosmetic"
          hover
          small
          sticky-header
          :filter="filter"
          :fields="fields"
          :items="items"
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
          <template #cell(pet_type)="row">
            <span class="rowdata">{{ formatAnimal(row.item.pet_type) }}</span>
          </template>
          <template #cell(service)="row">
            <span class="rowdata">{{ formatService(row.item.service) }}</span>
          </template>
          <template #cell(actions)="row" class="d-block">
            <b-button
              size="sm"
              @click="openModal(row.item)"
              class="mr-1 btn-info"
            >
              <b-icon-info-circle />
            </b-button>

            <b-button size="sm" @click="deleteConfirm(row.item)" class="btn-del"
              ><b-icon-trash
            /></b-button>
          </template>
        </b-table>
      </b-tab>
    </b-tabs>

    <b-modal v-if="selectedItem" v-model="showModalInfo">
      <template #modal-header>
        <p style="color: #5c002e; font-size: larger;">
          {{ selectedItem.appointment_date }}
        </p>
      </template>
      <template #modal-footer="{close}">
        <b-button size="sm" @click="cancel()">Bezárás</b-button>
      </template>

      <h3 class="datatitle">Gazdi adatai:</h3>
      <p class="datasmall">
        <strong>Név: </strong>{{ selectedItem.owner_name }}
      </p>
      <p class="datasmall"><strong>E-mail:</strong> {{ selectedItem.email }}</p>
      <p class="datasmall">
        <strong>Telefonszám:</strong> {{ selectedItem.phone }}
      </p>
      <h3 class="datatitle">Kisállat adatai:</h3>
      <p class="datasmall">
        <strong>Kisállat neve:</strong> {{ selectedItem.pet_name }}
      </p>
      <p class="datasmall">
        <strong>Fajta: </strong>{{ formatAnimal(selectedItem.pet_type) }}
      </p>
      <p class="datasmall">
        <strong>Szolgáltatás: </strong
        >{{ formatService(selectedItem.treatment_type) }}
      </p>
      <p class="datasmall">
        <strong>Szőr hosszúsága: </strong>{{ formatFur(selectedItem.fur) }}
      </p>
      <p class="datasmall">
        <strong>Kisállat mérete:</strong> {{ formatSize(selectedItem.options.dogsize) }}
      </p>
    </b-modal>
  </div>
</template>

<script>
import { serviceCodes, animalCodes, furCodes, sizeCodes } from "../../../data";
export default {
  data() {
    return {
      cosmeticsAppointments: null,
      filter: null,
      fields: [
        { key: "appointment_time", label: "Lefoglalt időpont" },
        { key: "owner_name", label: "Gazdi neve" },
        { key: "pet_name", label: "Kisállat neve" },
        { key: "pet_type", label: "Kisállat fajtája" },
        {
          key: "treatment_type",
          label: "Szolgáltatás",
          formatter: v => this.formatService(v)
        },
        { key: "actions", label: "" }
      ],
      serviceCodes: serviceCodes,
      animalCodes: animalCodes,
      furCodes: furCodes,
      sizeCodes: sizeCodes,
      selectedItem: null,
      showModalInfo: false
    };
  },
  methods: {
    async loadCosmeticsAppointments() {
      const response = await fetch(
        "http://localhost:81/cosmetics-appointment",
        { headers: { Accept: "application/json" } }
      );
      this.cosmeticsAppointments = await response.json();
      console.log(this.cosmeticsAppointments)
    },

    openModal(item) {
      this.selectedItem = item;
      this.showModalInfo = true;
      console.log(item);
    },

    cancel() {
      this.selectedItem = null;
      this.showModalInfo = false;
    },

    deleteConfirm(item) {
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
          console.log(value, item);

          if (value === true) {
            fetch("http://localhost:81/cosmetics-appointment/" + item.id, {
              method: "DELETE"
            }).then(response => {
              this.loadCosmeticsAppointments();
            });
          }
        })
        .catch(err => {
          // An error occurred
        });
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
    linkClass(idx) {
      if (this.tabIndex === idx) {
        return ["activetab"];
      } else {
        return ["text-dark"];
      }
    }
  },

  mounted() {
    this.loadCosmeticsAppointments();
  }
};
</script>

<style>
.btn-del {
  border: none;
}

.btn-del:hover {
  background-color: #ba3c3c;
  color: #ffffff;
  border: 0px;
}

.btn-info {
  background-color: #5c002e;
  color: #ffffff;
  border: none;
}

.btn-info:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
  border: none;
}

.activetab {
  color: #5c002e;
}

.page-link.active,
.active > .page-link {
  background-color: #5c002e;
  border-color: #5c002e;
}
</style>
