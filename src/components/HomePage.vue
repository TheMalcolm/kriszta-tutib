<template>
  <div>
    <header style="background-color: #F0A8CC20">
      <Bar />
      <b-container>
        <b-row>
          <b-col class="herocol">
            <img :src="heroImage" alt="Tuti bunda kozmetika" class="hero" />
          </b-col>
          <b-col class="bigtext">
            <h1 class="mb-3 welcome">
              Üdvözöllek a Tuti-Bunda Kutyakozmetika és Panzió oldalán!
            </h1>
            <p class="mb-3">
              Kedves látogató, örülök, hogy az oldalra tévedtél. Kérlek böngéssz
              bátran, ismerd meg a munkásságom és foglalj időpontot kedvedre!
            </p>
            <button
              class="btn btn-primary align-self-center cta-button"
              @click="scrollToAboutSection"
            >
              Rólam
            </button>
          </b-col>
        </b-row>
      </b-container>
    </header>
    <b-container
      style="padding-top: 70px; padding-left: 0px; color: #5c002e; font-family: 'Crimson Pro', serif;"
    >
      <h1>Szolgáltatásaim</h1>
      <b-row cols="12" sm="6">
        <b-col class="bigico mb-5 mb-md-0">
          <router-link :to="{ name: 'Cosmetics' }"
            ><img :src="groom" alt="Kozmetika"
          /></router-link>
        </b-col>
        <b-col class="bigico mb-5 mb-md-0">
          <router-link :to="{ name: 'DogBoarding' }"
            ><img :src="hotel" alt="Panzio"
          /></router-link>
        </b-col>
      </b-row>
    </b-container>
    <div>
      <div style="padding-bottom: 40px;" id="about">
        <div
          class="container"
          style="background-color: #5c002e; border-radius: 15px; margin-top: 30px;"
        >
          <h3
            style="color:white; padding: 5px; font-family: 'Crimson Pro', serif;"
          >
            Rólam
          </h3>
        </div>
      </div>

      <div
        class="container"
        style="text-align: left; color: #5c002e; margin-bottom: 30px;"
      >
        <p c>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at
          suscipit lorem. Nulla eu diam nec arcu tempor molestie. Mauris
          accumsan ullamcorper eros quis pretium. Nunc ornare efficitur massa, a
          fermentum justo. Integer consequat ante ut nisi dictum commodo. Nunc
          bibendum orci felis, et elementum tortor fringilla at. Morbi in erat
          imperdiet, volutpat mi porttitor, malesuada nisl. Morbi gravida tempor
          faucibus. Nulla posuere justo et libero ullamcorper, id mattis sem
          mollis. Vestibulum pulvinar vulputate velit, vel mattis erat interdum
          vitae. Nulla molestie, libero et porta vulputate, ligula purus
          pellentesque dui, eu maximus ex libero vel magna. Fusce bibendum erat
          turpis.
        </p>
      </div>
      <b-container lg="10">
        <b-row cols="4" cols-md="4" cols-lg="4">
          <b-col> <img src="../assets/home_1.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_2.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_3.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_4.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_5.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_6.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_7.jpg" class="gallery" /> </b-col>
          <b-col> <img src="../assets/home_8.jpg" class="gallery" /> </b-col>
        </b-row>
        <b-row> </b-row>
      </b-container>
    </div>
    <Footer />
  </div>
</template>

<script>
import router from "../router";
import Footer from "../components/Shared/Footer.vue";
import Bar from "./Shared/Bar.vue";

export default {
  name: "HomePage",
  data() {
    return {
      logo: require("../assets/tuti-bunda-logo.png"),
      heroImage: require("../assets/hero-image.png"),
      groom: require("../assets/groomico.png"),
      hotel: require("../assets/hotelico.png")
    };
  },
  components: { router, Footer, Bar },
  methods: {
    scrollToAboutSection() {
      var aboutSection = document.getElementById("about");
      aboutSection.scrollIntoView({ behavior: "smooth" });
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.bg-info {
  background-color: transparent !important;
}

.gallery {
  width: 222px;
  height: 222px;
  border-radius: 15px;
  margin-bottom: 81px;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
.welcome {
  font-family: "Crimson Pro", serif;
}
.cta-button {
  background-color: #5c002e;
  border-radius: 33px;
  display: inline-block;
  cursor: pointer;
  color: #ffffff;
  border: 0px;
  font-size: 1.4rem;
  width: 15rem;

  text-decoration: none;
}
.cta-button:hover {
  background-color: rgba(240, 168, 204, 20);
}
.services {
  padding-top: 10px;
}

.nav-btn {
  text-decoration: none;
  color: #5c002e;
  transition: color 0.5s, font-size 0.5s;
  font-size: medium;
  font-family: "Crimson Pro", serif;
}

.contact {
  margin-top: 10px;
  padding-bottom: 10px;
}

.nav-btn:hover {
  font-size: large;
}

.bigtext {
  text-align: left;
  transform: translateY(50px);
}

.bigico {
  margin-bottom: 20px;
  cursor: pointer;
}

.hero {
  transform: translateY(50px);
}

.links {
  color: #ffffff;
  margin-bottom: 0px;
  text-align: left;
  text-decoration: none;
}

@media screen and (max-width: 992px) {
  .gallery {
    width: 150px;
    height: 150px;
  }
}

@media screen and (max-width: 769px) {
  .bigico {
    margin-bottom: 0px;
  }

  .bigico > img {
    max-width: 60vw;
  }

  .gallery {
    width: 110px;
    height: 110px;
  }

  .hero {
    height: 80%;
    transform: none;
  }
  .contact {
    margin-left: 10px;
  }

  .welcome {
    margin-top: 20px;
    margin-bottom: 20px !important;
  }

  .herocol {
    height: 85%;
  }
  .bigtext {
    text-align: center;
    transform: none;
  }

  .cta-button {
    margin-bottom: 10px;
  }
}
</style>
