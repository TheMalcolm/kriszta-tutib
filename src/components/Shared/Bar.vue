<template>
  <div class="container">
    <b-navbar toggleable="lg" variant="info" style="padding: 0px;">
      <b-navbar-brand href="/">
        <img
          src="../../assets/tuti-bunda-logo.png"
          style=" width: 120px; "
          alt="Logo"
        />
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" class="justify-content-end" is-nav>
        <b-navbar-nav class="ml-auto " style="color: #5c002e;">
          <b-nav-item href="#">
            <router-link class="nav-btn" :to="{ name: 'HomePage' }"
              >Főoldal</router-link
            >
          </b-nav-item>
          <b-nav-item href="#">
            <router-link class="nav-btn" :to="{ name: 'Cosmetics' }"
              >Kozmetika</router-link
            >
          </b-nav-item>
          <b-nav-item href="#">
            <router-link class="nav-btn" :to="{ name: 'DogBoarding' }"
              >Panzió</router-link
            >
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
import router from "../../router";

export default {
  name: "Bar",
  components: { router }
};
</script>

<style>
.bg-info {
  background-color: transparent !important;
}

.nav-btn {
  text-decoration: none;
  color: #5c002e;
  transition: color 0.5s, font-size 0.5s;
  font-size: medium;
  font-family: "Crimson Pro", serif;
}

.nav-btn:hover {
  font-size: large;
}
</style>
