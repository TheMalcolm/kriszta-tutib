<template>
  <div>
    <header style="background-color: #F0A8CC20; ">
      <Bar></Bar>

      <b-container>
        <b-row>
          <b-col>
            <h1
              style="padding-top: 75px; color: #5c002e; font-family: 'Crimson Pro', serif; font-size: 300%; margin-bottom: 15px; justify-self: right;"
            >
              TutiBunda Kutyapanzió
            </h1>
            <h3>Kutyáknak tervezve, szeretettel.</h3>
            <p style="margin-top: 25px; text-align: justify;">
              Panziónk állattartási célból gondosan kialakított. A kedvenceket
              zárt, biztonságos, otthonos kennelben helyezzük el. A lakásban
              tartott kutyusok számára fűthető belső kennel, míg a kertben
              tartottaknak árnyékos külső kennel áll rendelkezésre.<br />
              Minden kutya külön kennelben lakik, de napközben az azonos
              habitusú és méretű kutyusok játszhatnak egymással. Külön
              elkerített, osztott, füves kifutóinkban naponta kétszer engedjük
              ki az állatokat.
            </p>
            <router-link :to="{ name: 'DogBoardingHouseAppointment' }"
              ><b-button class="btn-board" style="margin-top: 40px;"
                >Foglalás</b-button
              ></router-link
            >
          </b-col>
          <b-col class="d-flex justify-content-center ">
            <img src="../assets/db1.png" class="dbpic" />
          </b-col>
        </b-row>
      </b-container>
    </header>
    <b-container>
      <b-col xs="12" style="padding-top: 70px; text-align: justify;">
        <h2>Mit kell tudni a hozzánk érkező gazdiknak és kutyusoknak?</h2>
        <b-tabs style="margin-bottom: 40px; margin-top: 40px;">
          <b-tab
            title="Mit tartalmaz a napi díj?"
            :title-link-class="linkClass(0)"
          >
            <b-card style="border-top: 0px;">
              <p style="margin-top: 15px;">
                <b-icon-check2-circle /> A hozzánk érkező kutyusok 24 órás
                teljes felügyelete.
              </p>
              <p><b-icon-check2-circle /> Folyamatos friss ivóvíz ellátás.</p>
              <p>
                <b-icon-check2-circle /> Etetés a gazdival egyezetetettek
                alapján.
              </p>
              <p>
                <b-icon-check2-circle /> Napi kétszeri egyéni vagy csoportos
                foglalkozás a kiskedvenc habitusának megfelelően.
              </p>
              <p>
                <b-icon-check2-circle /> Fotós állapot jelentés a gazdiknak.
              </p>
              <p>
                <b-icon-check2-circle /> A kutya életviteléhez alkalmazkodó kül-
                vagy beltéri elszállásolás.
              </p>
              <p><b-icon-check2-circle /> Rendszeresen tisztított környezet.</p>
              <p>
                <b-icon-check2-circle /> Egyéni igények szerinti esetleges
                gyógyszeres vagy vitaminos kezelések fenntartása.
              </p></b-card
            >
          </b-tab>
          <b-tab title="Mit hozz magaddal?" :title-link-class="linkClass(0)">
            <b-card style="border-top: 0px;">
              <p style="margin-top: 15px;">
                <b-icon-hand-index /> Jól bevált száraztáp vagy más étkeztetési
                szokásnak megfelelő etetés, a tartozkodás időtartamára elegendő
                mennyiségben.
              </p>
              <p>
                <b-icon-hand-index /> Oltási könyv, érvényes (1 éven belüli)
                veszettség elleni és kombinált oltás igazolására.
              </p>
              <p>
                <b-icon-hand-index /> Ismerős illatú játék vagy textília ami
                segíti, hogy a kiskedvenc könnyebben otthon érezhesse magát.
              </p>
              <p>
                <b-icon-hand-index /> Gyógyszer vagy vitamin(amennyiben
                szükséges), a tartozkodás időtartamára elegendő mennyiségben.
              </p>
            </b-card>
          </b-tab>
          <b-tab title="Áraink" :title-link-class="linkClass(0)">
            <b-card style="border-top: 0px;"
              ><b-table
                :items="prices"
                :fields="fields"
                style="text-align: left; font-weight: bold;  "
                striped
              ></b-table
            ></b-card>
          </b-tab>
        </b-tabs>
      </b-col>
      <b-row
        ><b-col
          ><router-link :to="{ name: 'DogBoardingHouseAppointment' }"
            ><b-button
              class="btn-board"
              style="margin-top: 20px; margin-bottom: 50px;"
              >Foglalás</b-button
            ></router-link
          ></b-col
        ></b-row
      >
    </b-container>

    <Footer />
  </div>
</template>
<script>
import Footer from "../components/Shared/Footer.vue";
import Bar from "../components/Shared/Bar.vue";

export default {
  name: "DogBoarding",
  components: {
    Bar,
    Footer
  },
  data() {
    return {
      prices: [
        { type: "Minden megkezdett nap", price: "4.500 Ft/nap" },
        {
          type: "Teljes kutyakozmetikai szolgáltatás",
          price: "6.000 Ft/tartozkodás"
        },
        { type: "Extra hosszú séta", price: "500 Ft/nap" },
        { type: "Fizioterápiás foglalkozás", price: "5.000/tartozkodás" }
      ],
      fields: [
        { key: "type", label: "" },
        { key: "price", label: "" }
      ]
    };
  },
  methods: {
    linkClass(idx) {
      if (this.tabIndex === idx) {
        return ["activetab"];
      } else {
        return ["text-dark"];
      }
    }
  }
};
</script>
<style>
.btn-board {
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
.dbpic {
  max-width: 380px;
  border-radius: 15px;
  margin-top: 20px;
  margin-bottom: 10px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  transform: translateY(50px);
  border-color: #5c002e;
  border-width: 2px;
  border-style: solid;
}

.activetab {
  color: #5c002e;
}

@media screen and (max-width: 769px) {
  .dbpic {
    height: 80%;
    transform: none;
    margin-bottom: 0px;
  }
}
</style>
