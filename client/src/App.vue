<template>
  <div id="app">
    <router-link to="/">Cars</router-link>
    <router-link to="/signup">SignUp</router-link>
    <router-link to="/LogIn">Login</router-link>
    <router-link to="/LogOut">LogOut</router-link>
    <router-view/>
  </div>
</template>

<script>
export default {
    name: 'App',
    data(){
        return {
            login: false
        }
    },
    computed: {

    }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
