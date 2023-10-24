<template>
    <div class="foot" style="background-color: #5c002e; color: white;">
    <b-container class="bv-example-row">
      <b-row >
        <b-col class="links foot" sm="12" md="4" style="margin-top: 10px;" >
            <div><router-link :to="{ name: 'HomePage' }" class="text-decoration-none text-reset">Főoldal</router-link></div>
          <div><router-link :to="{ name: 'CosmeticsAppointment' }"  class="text-decoration-none text-reset">Kozmetika</router-link></div>
          <div><router-link :to="{ name: 'DogBoardingHouseAppointment' }" class="text-decoration-none text-reset ">Panzió</router-link></div>
          
         </b-col>
    <b-col   class="foot-link" sm="12" md="4">

      <a href="https://www.facebook.com/tutibundakutyakozmetika"><img src="../../assets/facebook.png"></a>
      <a href="https://www.instagram.com/tuti_bunda_kutyakozmetika/?hl=hu"><img src="../../assets/instagram.png"></a>
    </b-col>
    
    <b-col  class="contact foot" sm="12" md="4" style="text-align: right;" >
     <p class="justify-content-end mb-0">9028, Győr, Lepke u. 30 </p>  
     <p  class="justify-content-end mb-0">+36 70 665 1405</p>
     <p  class="justify-content-end mb-0">szroxi200@icloud.com</p>
    </b-col>
  
  </b-row></b-container>
  </div>
</template>
<script>

import router from '../../router'


export default {
    name: 'Footer',
    components: { router }
}

</script>

<style>

.contact {
  
  margin-top: 10px;
  padding-bottom: 10px;
}
.links{
  color: #ffffff;
  margin-bottom: 0px;
  text-align: left ;
  text-decoration: none;
}
.custom-link {
  text-decoration: none;
  margin-bottom: 0px;
}

@media screen and (max-width: 765.98px) {
    .foot{
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }
}
</style>