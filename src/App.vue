<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>

export default {
  name: 'App'
}
</script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;700&family=Open+Sans:ital,wght@0,400;0,600;0,700;1,300&display=swap');

#app {
  font-family: 'Open Sans', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #5c002e;
}
</style>
