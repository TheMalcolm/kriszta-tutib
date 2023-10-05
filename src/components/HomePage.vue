<template>
  <header style="background-color: #F0A8CC20">
    <div class="container">
      <b-navbar toggleable="lg" variant="info">
        <b-navbar-brand href="/">
          <img :src="logo" alt="Kitten">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
          <b-navbar-nav>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto ">
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#">Főoldal</b-nav-item>
              <b-nav-item href="#">Kozmetika</b-nav-item>
              <b-nav-item href="#">Panzió</b-nav-item>
              <b-nav-item href="#">Kalkulátor</b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>

      <div class="row">
        <div class="col-10 offset-1">
          <div class="d-flex gap-5 align-items-center">
            <img :src="heroImage" alt="Tuti bunda kozmetika" style="transform: translateY(50px);"/>
            <div style="text-align: left;">
              <h1 class="mb-5">Üdvözöllek a Tuti-Bunda Kutyakozmetika és Panzió oldalán!</h1>
              <p class="mb-3">Kedves látogató, örülök, hogy az oldalra tévedtél. Kérlek böngéssz bátran, ismerd meg a munkásságom és foglalj időpontot kedvedre!</p>
              <button class="btn btn-primary cta-button">Rólam</button>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </header>
</template>

<script>
export default {
  name: 'HomePage',
  data () {
    return {
      logo: require('../assets/tuti-bunda-logo.png'),
      heroImage: require('../assets/hero-image.png'),
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.bg-info {
  background-color: transparent !important;
}
</style>
