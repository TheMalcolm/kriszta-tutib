<template>
  <div>
    <header style="background-color: #F0A8CC20; ">
      <Bar />
    </header>
    <b-container>
      <b-col xs="12">
        <h1
          style="padding-top: 15px; color: #5c002e; font-family: 'Crimson Pro', serif; font-size: 300%; margin-bottom: 30px;"
          class="my-5"
        >
          Kozmetikai szolgáltatásaim
        </h1>
      </b-col>
    </b-container>
    <b-container>
      <b-row>
        <b-col
          ><router-link :to="{ name: 'CosmeticsAppointment' }"
            ><b-button class="btn-app">Időpontfoglalás</b-button></router-link
          >
        </b-col>
      </b-row>
      <b-row>
        <b-col class="d-flex justify-content-center ">
          <b-card title="Teljes Kozmetika" class="mb-2 cimg">
            <b-card-body
              ><img src="../assets/fullcosmetics.jpg" class="pic" />
            </b-card-body>

            <b-card-text>
              Teljes kozmetikai szolgáltatásom keretében a kis kedvencek teljes
              karbantartáson mennek keresztül igényeiknek megfelelően.
            </b-card-text>
            <b
              >A szolgáltatás elérhető kutyák, macskák, nyulak és tengerimalacok
              számára.</b
            >
            <b-table
              :items="fullcosmetics"
              :fields="fields"
              style="text-align: left; font-weight: bold;  "
              striped
            >
            </b-table>
          </b-card>
        </b-col>

        <b-col class="d-flex justify-content-center">
          <b-card title="Fürdetés, fésülés, nyírás" class="mb-2 cimg">
            <b-card-body
              ><img src="../assets/ffn.jpg" class="pic" />
            </b-card-body>

            <b-card-text>
              Ezen szolgáltatás azon vendégeknek lett kitalálva akik a
              hétköznapi egészségügyi feladatok ellátják viszont időnként
              szeretnék ha kedvencük varázslatosan tisztává válhatna.
            </b-card-text>
            <b>A szolgáltatás elérhető kutyák és macskák számára.</b>
            <b-table
              :items="ffn"
              :fields="fields"
              style="text-align: left; font-weight: bold;  "
              striped
            >
            </b-table>
          </b-card>
        </b-col>

        <b-col class="d-flex justify-content-center">
          <b-card title="Fésülés, nyírás" class="mb-2 cimg">
            <b-card-body
              ><img src="../assets/fn.jpg" class="pic" />
            </b-card-body>

            <b-card-text>
              Fésülés és nyírás szolgáltatásom azok számára lett kialakítva akik
              csak egy gyors fazon igazításra szeretnének benézni hozzám vagy
              esetleg fajtájukból adódóan nem ajánlott számukra a fürdetés.
            </b-card-text>
            <b
              >A szolgáltatás elérhető kutyák, macskák, nyulak és tengerimalacok
              számára.</b
            >
            <b-table
              :items="fn"
              :fields="fields"
              style="text-align: left; font-weight: bold;  "
              striped
            >
            </b-table>
          </b-card>
        </b-col>

        <b-col class="d-flex justify-content-center">
          <b-card title="Egészségügyi kezelés" class="mb-2 cimg">
            <b-card-body
              ><img src="../assets/eu.jpg" class="pic" />
            </b-card-body>

            <b-card-text>
              Vendégeimnek lehetősége van egészségügyi kezelés választására is
              amely tartalmazza az egészségügyi nyírást, karomvágást,
              tappancsnyírást, fül és szemtisztítást.
            </b-card-text>
            <b
              >A szolgáltatás elérhető kutyák, macskák, nyulak és tengerimalacok
              számára.</b
            >
            <b-table
              :items="eu"
              :fields="fields"
              style="text-align: left; font-weight: bold;  "
              striped
            >
            </b-table>
          </b-card>
        </b-col>
        <b-col class="d-flex justify-content-center">
          <b-card title="Karomvágás" class="mb-2 cimg">
            <b-card-body
              ><img src="../assets/kv.jpg" class="pic" />
            </b-card-body>

            <b-card-text>
              Gyors karomvágás a kedveceink tappancsainak egészségének
              érdekében.
            </b-card-text>
            <b
              >A szolgáltatás elérhető kutyák, macskák, nyulak és tengerimalacok
              számára.</b
            >
            <b-table
              :items="kv"
              :fields="fields"
              style="text-align: left; font-weight: bold;  "
              striped
            >
            </b-table>
          </b-card>
        </b-col>
      </b-row>
      <b-row>
        <b-col
          ><router-link :to="{ name: 'CosmeticsAppointment' }"
            ><b-button class="btn-app bottom"
              >Időpontfoglalás</b-button
            ></router-link
          >
        </b-col>
      </b-row>
    </b-container>
    <Footer />
  </div>
</template>
<script>
import Footer from "../components/Shared/Footer.vue";
import Bar from "../components/Shared/Bar.vue";
import fullcosmetics from "../assets/fullcosmetics.jpg";
import router from "../router";

export default {
  name: "Cosmetics",
  components: {
    Bar,
    Footer
  },
  data() {
    return {
      fullcosmetics: [
        { type: "Rövid szőrű kutya", price: "5.000 Ft-tól" },
        { type: "Félhosszú szőrű kutya", price: "7.000 Ft-tól" },
        { type: "Hosszú szőrű kutya", price: "9.000 Ft-tól" },
        { type: "Rövid szőrű macska", price: "4.000 Ft-tól" },
        { type: "Félhosszú szőrű macska", price: "5.000 Ft-tól" },
        { type: "Hosszú szőrű macska", price: "6.000 Ft-tól" },
        { type: "Rövid szőrű nyulak", price: "3.000 Ft-tól" },
        { type: "Hosszú szőrű nyulak", price: "4.000 Ft-tól" },
        { type: "Rövid szőrű tengerimalacok", price: "3.000 Ft-tól" },
        { type: "Hosszú szőrű tengerimalacok", price: "4.000 Ft-tól" }
      ],
      ffn: [
        { type: "Rövid szőrű kutya", price: "4.000 Ft-tól" },
        { type: "Félhosszú szőrű kutya", price: "6.000 Ft-tól" },
        { type: "Hosszú szőrű kutya", price: "8.000 Ft-tól" },
        { type: "Rövid szőrű macska", price: "3.000 Ft-tól" },
        { type: "Félhosszú szőrű macska", price: "4.000 Ft-tól" },
        { type: "Hosszú szőrű macska", price: "5.000 Ft-tól" }
      ],
      fn: [
        { type: "Rövid szőrű kutya", price: "3.000 Ft-tól" },
        { type: "Félhosszú szőrű kutya", price: "4.000 Ft-tól" },
        { type: "Hosszú szőrű kutya", price: "5.000 Ft-tól" },
        { type: "Rövid szőrű macska", price: "2.000 Ft-tól" },
        { type: "Félhosszú szőrű macska", price: "3.000 Ft-tól" },
        { type: "Hosszú szőrű macska", price: "4.000 Ft-tól" },
        { type: "Rövid szőrű nyulak", price: "2.000 Ft-tól" },
        { type: "Hosszú szőrű nyulak", price: "3.000 Ft-tól" },
        { type: "Rövid szőrű tengerimalacok", price: "2.000 Ft-tól" },
        { type: "Hosszú szőrű tengerimalacok", price: "3.000 Ft-tól" }
      ],
      eu: [
        { type: "Kutya", price: "5.000 Ft" },
        { type: "Macska", price: "4.000 Ft" },
        { type: "Nyúl", price: "3.000 Ft" },
        { type: "Tengerimalac", price: "3.000 Ft" }
      ],
      kv: [{ type: "Minden állat számára", price: "1.000 Ft" }],
      fields: [
        { key: "type", label: "" },
        { key: "price", label: "" }
      ]
    };
  }
};
</script>

<style>
.cimg {
  max-width: 380px;
  min-width: 380px;
  color: #5c002e;
  font-family: "Crimson Pro", serif;
  border-radius: 15px;
  box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.25);
  height: auto;
}

.btn-app {
  width: 15rem;
  font-size: 1.4rem;
  background-color: #5c002e;
  border-radius: 33px;
  color: #ffffff;
  border: 0px;
  text-decoration: none;
  margin-bottom: 40px;
  margin-top: -8px;
}

.bottom {
  margin-top: 40px;
}

.btn:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
}

.pic {
  width: 100%;
  height: auto;
  border-radius: 15px;
}
</style>
