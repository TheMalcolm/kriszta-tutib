<template>
  <div>
  <header style="background-color: #F0A8CC20">
    <div class="container">
      <b-navbar toggleable="lg" variant="info" style="padding: 0px;">
        <b-navbar-brand href="/">
          <img :src="logo" style=" width: 120px;" alt="Logo">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
          <b-navbar-nav>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav pills class="ml-auto " style="color: #5c002e;" >
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#" >
                <router-link class="nav-btn" :to="{ name: 'HomePage' }">Főoldal</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'CosmeticsAppointment' }">Kozmetika</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link class="nav-btn" :to="{ name: 'DogBoardingHouseAppointment' }">Panzió</router-link>
              </b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>

      <b-container>
        <b-row>
          <b-col class="herocol">
            <img :src="heroImage" alt="Tuti bunda kozmetika" class="hero" />
          </b-col>
          <b-col class="bigtext" >
            <h1 class="mb-5 welcome" >Üdvözöllek a Tuti-Bunda Kutyakozmetika és Panzió oldalán!</h1>
            <p class="mb-3">Kedves látogató, örülök, hogy az oldalra tévedtél. Kérlek böngéssz bátran, ismerd meg a munkásságom és foglalj időpontot kedvedre!</p>
            <button class="btn btn-primary align-self-center cta-button">Rólam</button>
          </b-col>
        </b-row>
      </b-container>
      
    </div>
  </header>
  <div class="container" style="padding-top: 70px; color: #5c002e;">
  <h1>Szolgáltatásaim</h1>
  <b-container class="bv-example-row">

  <b-row style="justify-content: center;">
    <b-col cols="12"  sm="6" class="bigico" ><img :src="groom" alt="Kozmetika" style="cursor: pointer;"/></b-col>
    <b-col cols="12" sm="6" class="bigico" ><img :src="hotel" alt="Panzio" style="cursor: pointer;" /></b-col>
  </b-row>
</b-container>
</div>
<div>
  <div style="padding-bottom: 40px;">
    <div class="container"  style="background-color: #5c002e; border-radius: 15px;">
<h3 style="color:white; padding: 5px;">Rólam</h3>
</div>
  </div>

<div class="container" style="text-align: left; color: #5c002e;">
<p c>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at suscipit lorem.  Nulla eu diam nec arcu tempor molestie. Mauris accumsan ullamcorper eros quis pretium.  Nunc ornare efficitur massa, a fermentum justo. Integer consequat ante ut nisi dictum commodo. Nunc bibendum orci felis, et elementum tortor fringilla at. Morbi in erat imperdiet, volutpat mi porttitor, malesuada nisl. Morbi gravida tempor faucibus. Nulla posuere justo et libero ullamcorper, id mattis sem mollis. Vestibulum pulvinar vulputate velit, vel mattis erat interdum vitae. Nulla molestie, libero et porta vulputate, ligula purus pellentesque dui,  eu maximus ex libero vel magna. Fusce bibendum erat turpis.</p>
</div>
</div>
<footer style="padding-top: 30px;">
  <div style="background-color: #5c002e; color: white;">
    <b-container class="bv-example-row">
      <b-row class="text-center">
        <b-col style="margin-top: 10px; margin-bottom: 8px; text-align: left; ">
          <b-row ><router-link class="links" :to="{ name: 'HomePage' }">Főoldal</router-link> </b-row>
          <b-row ><router-link class="links" :to="{ name: 'CosmeticsAppointment' }">Kozmetika</router-link> </b-row>
          <b-row ><router-link class="links" :to="{ name: 'HostelAppointment' }">Panzió</router-link> </b-row>
          <b-row ><router-link class="links" :to="{ name: 'Calculator' }">Kalkulátor</router-link> </b-row>
         </b-col>
    <b-col cols="6">

      <a href="https://www.facebook.com/tutibundakutyakozmetika"><img src="../assets/facebook.png"></a>
      <a href="https://www.instagram.com/tuti_bunda_kutyakozmetika/?hl=hu"><img src="../assets/instagram.png"></a>
    </b-col>
    
    <b-col  class="contact" style="text-align: right;" >
     <b-row class="justify-content-end">9028, Győr, Lepke u. 30 </b-row> 
     <b-row class="justify-content-end">+36 70 665 1405</b-row>
     <b-row class="justify-content-end">szroxi200@icloud.com</b-row>
    </b-col>
  
  </b-row></b-container>
    
  </div>
</footer>

</div>
</template>

<script>
import router from '../router';

export default {
    name: 'HomePage',
    data() {
        return {
            logo: require('../assets/tuti-bunda-logo.png'),
            heroImage: require('../assets/hero-image.png'),
            groom: require('../assets/groomico.png'),
            hotel: require('../assets/hotelico.png')
        };
    },
    components: { router }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.bg-info {
  background-color: transparent !important;
}
.cta-button {
  background-color:#5c002e;
	border-radius:33px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	border: 0px;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
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

.bigico{
  margin-bottom: 20px;
}

.hero{
  transform: translateY(50px);
}

.links{
  color: #ffffff;
  margin-bottom: 0px;
  text-align: left ;
  text-decoration: none;
}

  @media screen and (max-width: 769px) {
    .bigico {
      transform: scale(0.78) translateX(-25px);
      margin-bottom: 0px;
    }

    .hero{
      height: 80%;
      transform: none;
      
    }
    .contact{
      margin-left: 10px;
    }

    .welcome{
      margin-top: 20px;
      margin-bottom: 20px !important;
    }

    .herocol{
      height: 85%;
    }
    .bigtext{
      text-align: center;
      transform: none;
    }

    .cta-button{
      margin-bottom: 10px;
    }
  }
</style>
