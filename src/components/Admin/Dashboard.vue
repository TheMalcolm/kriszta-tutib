<template>
    <div>
      <header style="background-color: #F0A8CC20">
    <div class="container">
      <b-navbar toggleable="lg" variant="info">
        <b-navbar-brand style="color:#5c002e" href="/">
          Tuti-Bunda Kutyakozmetika és Panzió
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
          <b-navbar-nav>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav pills class="ml-auto " style="color: #5c002e;" >
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#" >
                <router-link class="nav-btn" :to="{ name: 'HomePage' }">Kijelentkezés</router-link>
              </b-nav-item>
             
          </b-navbar-nav>
        </b-collapse>
      </b-navbar></div></header>

      <div>
  <b-jumbotron header="Foglalásaink" style="color: #5c002e; padding-top: 20px;">
  </b-jumbotron>
</div>
        
    <div class="container"> 
      <div class="row d-flex flex-row">
        <div class="col"><div class="card mt-5">
          <h3 style="color: #5c002e;">Kozmetika</h3>
            <b-table striped hover :items="kozm"></b-table>
        </div></div>
        <div class="row d-flex flex-row"><div class="col"><div class="card mt-5">
          <h3 style="color: #5c002e;">Panzió</h3>
            <b-table striped hover :items="panz"></b-table>
        </div></div></div>
        
      </div>
        </div>
      </div>
      
        
    
</template>

<script>
export default {
    name: 'Dashboard',

    data() {
      return {
        
        kozm: [
          { Időpont: '2023.10.09. 13:20', Szolgáltatás: 'Fürdetés+nyírás', Fajta:'Csau-csau', Név:'Kriszta', Telefonszám:'+3670255424', Email:'kriszta@kriszta.hu' }
          
        ],
        panz: [
          {Érkezés: '2023.10.10', Távozás: '2023.11.01', Fajta: 'Csau-csau', Nem:'Kan', Táp:'Hozott', Megjegyzés:'nincs' }
        ]
      }
    }
}
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
  padding:10px;
  border-radius: 33px;
}

.nav-btn:hover {
  
  color: #f00e7f;
  }

</style>