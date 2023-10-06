<template>
  <div>
  <header style="background-color: #F0A8CC20">
    <div class="container">
      <b-navbar toggleable="lg" variant="info">
        <b-navbar-brand href="/">
          <img :src="logo" style=" width: 150px;" alt="Logo">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
          <b-navbar-nav>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto " style="color: #5c002e;" >
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#">
                <router-link :to="{ name: 'HomePage' }">Főoldal</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link :to="{ name: 'CosmeticsAppointment' }">Kozmetika</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link :to="{ name: 'HostelAppointment' }">Panzió</router-link>
              </b-nav-item>
              <b-nav-item href="#">
                <router-link :to="{ name: 'Calculator' }">Kalkulátor</router-link>
              </b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>

      <div class="row">
        <div class="col-10 offset-1 ">
          <div class="d-flex gap-5 align-items-center " style="color: #5c002e;"  >
            <img :src="heroImage" alt="Tuti bunda kozmetika" style="transform: translateY(50px);"/>
            <div style="text-align: left;">
              <h1 class="mb-5" >Üdvözöllek a Tuti-Bunda Kutyakozmetika és Panzió oldalán!</h1>
              <p class="mb-3">Kedves látogató, örülök, hogy az oldalra tévedtél. Kérlek böngéssz bátran, ismerd meg a munkásságom és foglalj időpontot kedvedre!</p>
            <button class="btn btn-primary align-self-center cta-button">Rólam</button>
             
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </header>
  <div class="container" style="padding-top: 70px; color: #5c002e;">
  <h1>Szolgáltatásaim</h1>
  <div class="row">
    <div class="col-10">
      <div class="container d-flex align-items-center justify-content-between" style="padding-top: 30px; padding-left: 20%; padding-bottom: 50px; ">
        <img :src="groom" alt="Kozmetika" style="cursor: pointer;"/>
        <img :src="hotel" alt="Kozmetika" style="cursor: pointer;" />

      </div>
    </div>
  </div>
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

</div>
</template>

<script>
export default {
  name: 'HomePage',
  data () {
    return {
      logo: require('../assets/tuti-bunda-logo.png'),
      heroImage: require('../assets/hero-image.png'),
      groom: require('../assets/groomico.png'),
      hotel: require('../assets/hotelico.png')
    }
  }
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
</style>
