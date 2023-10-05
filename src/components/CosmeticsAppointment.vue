<template>
    <div>
        <div>
  <header style="background-color: #F0A8CC20">
    <div class="container">
      <b-navbar toggleable="lg" variant="info">
        <b-navbar-brand href="/">
          <img src="logo" style=" width: 150px;" alt="Logo">
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
          <b-navbar-nav>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto " style="color: #5c002e;" >
              <!-- Using 'button-content' slot -->
              <b-nav-item href="#">Főoldal</b-nav-item>
              <b-nav-item href="#">Kozmetika</b-nav-item>
              <b-nav-item href="#">Panzió</b-nav-item>
              <b-nav-item href="#">Kalkulátor</b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>

      
      
      
    </div>
  </header>
  


</div>
    <div class="container">
        <div class="row">
            <h1 style="padding-top: 30px; color: #5c002e;">Foglalj időpontot kozmetikánkba!</h1>
            <div class="col-6 offset-3">
                <div class="card p-5 mt-5">
                    <form action="">
                        <div class="form-group mb-3">
                            <label for="name">Név</label>
                            <input type="text" class="form-control" v-model="form.name">
                        </div>
                
                        <div class="form-group">
                            <label for="">Nap kiválasztása</label>
                            <select name="day" id="day" v-model="form.day" class="form-control">
                                <option :value="key" v-for="(day, key) in days" v-bind:key="key">{{ day }}</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    
</template>

<script>
export default {
    name: 'CosmeticsAppointment',
    logo: require('../assets/tuti-bunda-logo.png'),
    data() {
        return {
            form: {
                name: '',
            },
            days: {
                day1: '2023 október 6.',
                day2: '2023 október 7.',
            }
        }
    }
}
</script>

<style scoped>

.bg-info {
  background-color: transparent !important;
}

</style>