<template>
  <div>
    <h3 style="color: #5c002e;">Panzió</h3>

    <b-table
      v-if="hotelReservations"
      id="boarding"
      hover
      small
      sticky-header
      :fields="fields"
      :items="hotelReservations.petHotelReservations"
      :per-page="0"
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
        <span class="rowdata">{{ formatDate(row.item.arrival) }}</span>
      </template>
      <template #cell(departure)="row">
        <span class="rowdata">{{ formatDate(row.item.departure) }}</span>
      </template>
      <template #cell(count)="row">
        <span class="rowdata">{{ row.item.count }}</span>
      </template>

      <template #cell(actions)="row" class="d-block">
        <b-button size="sm" @click="openModal(row.item)" class="mr-1 btn-info">
          <b-icon-info-circle />
        </b-button>

        <b-button size="sm" @click="deleteConfirm(row.item)" class="btn-del"
          ><b-icon-trash
        /></b-button>
      </template>
    </b-table>

    <b-pagination
      v-if="hotelReservations"
      v-model="currentPage"
      :total-rows="hotelReservations.meta.total"
      :per-page="hotelReservations.meta.per_page"
      aria-controls="boarding"
      hide-ellipsis
      variant="primary"
    ></b-pagination>

    <b-modal v-if="selectedItem" v-model="showModalInfo">
      <template #modal-header>
        <p style="color: #5c002e; font-size: larger;">
          <strong>Foglalás részletei</strong>
        </p>
      </template>
      <template #modal-footer="{close}">
        <b-button size="sm" @click="cancel()">Bezárás</b-button>
      </template>
      <p class="datasmall">
        <strong>Érkezés: </strong>{{ selectedItem.stay_from }}
      </p>
      <p class="datasmall">
        <strong>Távozás: </strong>{{ selectedItem.stay_till }}
      </p>
      <p class="datasmall">
        <strong>Tartózkodás ideje: </strong
        >{{ selectedItem.stayLengthDays }} nap
      </p>
      <h3 class="datatitle">Gazdi adatai:</h3>
      <p class="datasmall">
        <strong>Név: </strong>{{ selectedItem.owner_name }}
      </p>
      <p class="datasmall"><strong>E-mail:</strong> {{ selectedItem.email }}</p>
      <p class="datasmall">
        <strong>Telefonszám:</strong> {{ selectedItem.phone }}
      </p>
      <p class="datasmall">
        <strong>Ár:</strong> {{ selectedItem.total }} <a> Ft</a>
      </p>
      <h3 v-if="selectedItem.pets_count === 1" class="datatitle">
        Kutyus adatai:
      </h3>
      <h3 v-else class="datatitle">Kutyusok adatai:</h3>
      <div v-for="(dog, index) in selectedItem.pets" :key="index">
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
        <hr
          v-if="
            selectedItem.pets_count > 1 && index < selectedItem.pets_count - 1
          "
          style="color:#5c002e"
        />
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  watch: {},
  data() {
    return {
      fields: [
        { key: "owner_name", label: "Gazdi neve" },
        { key: "stay_from", label: "Érkezés" },
        { key: "stay_till", label: "Távozás" },
        { key: "pets_count", label: "Kisállatok száma" },
        { key: "actions", label: "" }
      ],
      filter: null,
      hotelReservations: null,
      currentPage: 1,
      selectedItem: null,
      showModalInfo: false
    };
  },

  methods: {
    openModal(item) {
      this.selectedItem = item;
      this.showModalInfo = true;
    },

    cancel() {
      this.selectedItem = null;
      this.showModalInfo = false;
    },
    showMsgBox() {},
    async loadHotelReservations() {
      const response = await fetch(
        "http://localhost:81/pet-hotel-reservation?page=" + this.currentPage,
        { headers: { Accept: "application/json" } }
      );
      this.hotelReservations = await response.json();
      this.currentPage = this.hotelReservations.meta.current_page;
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
            fetch("http://localhost:81/pet-hotel-reservation/" + item.id, {
              method: "DELETE"
            }).then(response => {
              this.loadHotelReservations();
              this.$swal({ icon: "success", text: "Sikeres törlés!" });
            });
          }
        })
        .catch(err => {
          // An error occurred
        });
    }
  },

  mounted() {
    this.loadHotelReservations();
  },

  watch: {
    currentPage: {
      handler: function(value) {
        this.loadHotelReservations();
      }
    }
  }
};
</script>
