<template>
  <div>
    <header style="background-color: #F0A8CC20">
      <div class="container">
        <b-navbar toggleable="lg" variant="info">
          <b-navbar-brand class="logo" style="color:#5c002e" href="/">
            Tuti-Bunda Kutyakozmetika és Panzió
          </b-navbar-brand>
        </b-navbar>
      </div>
    </header>
    <b-container>
      <b-row class="justify-content-center mt-5">
        <b-col xl="5" lg="6" md="8" xs="8">
          <h1 class="mb-3">Bejelentkezés</h1>
          <b-card class="card-log pt-2">
            <b-form @submit="submitForm">
              <b-form-group
                id="usernamegroup"
                label-size="lg"
                label="Felhasználónév:"
                label-for="username"
                class="labels"
              >
                <b-form-input
                  size="lg"
                  id="username"
                  v-model="form.username"
                  required
                ></b-form-input>
              </b-form-group>
              <b-form-group
                id="passwordgroup"
                label-size="lg"
                label="Jelszó:"
                label-for="password"
                class="labels"
              >
                <b-form-input
                  size="lg"
                  id="password"
                  v-model="form.password"
                  type="password"
                  required
                ></b-form-input>
              </b-form-group>
              <b-button size="lg" type="submit" class="btn-login mt-3 mb-2"
                >Belépés</b-button
              >
            </b-form>
          </b-card>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>
<script>
import router from "../../router";

export default {
  name: "Login",
  components: { router },
  data() {
    return {
      form: {
        username: "",
        password: ""
      }
    };
  },
  methods: {
    submitForm(e) {
      e.preventDefault();
      if (this.form.username === "admin" && this.form.password === "admin") {
        this.$router.push("/admin/foglalasok");
      } else {
        alert("Hibás felhasználónév vagy jelszó!");
      }
    }
  }
};
</script>
<style>
.bg-info {
  background-color: transparent !important;
}

.card-log {
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  background-color: #f0a8cc20;
  border: none;
  border-radius: 15px;
}

.btn-login {
  background-color: #5c002e;
  border-radius: 33px;
  color: #ffffff;
  border: 0px;
  text-decoration: none;
}

.btn-login:hover {
  background-color: rgba(240, 168, 204, 20);
  color: #ffffff;
}

.labels {
  text-align: left;
  color: #5c002e;
  padding-bottom: 10px;
}

@media screen and (max-width: 426px) {
  .logo {
    font-size: smaller;
  }
}
</style>
