import Vue from "vue";
import Router from "vue-router";
import HomePage from "@/components/HomePage";
import CosmeticsAppointment from "@/components/CosmeticsAppointment";
import DogBoardingHouseAppointment from "@/components/DogBoardingHouseAppointment";
import Dashboard from "@/components/Admin/Dashboard";
import Login from "@/components/Admin/Login";
import Cosmetics from "@/components/Cosmetics";
import DogBoarding from "@/components/DogBoarding";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "HomePage",
      component: HomePage
    },
    {
      path: "/idopontfoglalas/kozmetika",
      name: "CosmeticsAppointment",
      component: CosmeticsAppointment
    },
    {
      path: "/idopontfoglalas/panzio",
      name: "DogBoardingHouseAppointment",
      component: DogBoardingHouseAppointment
    },

    {
      path: "/admin",
      name: "Login",
      component: Login
    },
    {
      path: "/admin/foglalasok",
      name: "Dashboard",
      component: Dashboard
    },
    {
      path: "/kozmetika",
      name: "Cosmetics",
      component: Cosmetics
    },
    {
      path: "/panzio",
      name: "DogBoarding",
      component: DogBoarding
    }
  ],
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  }
});
