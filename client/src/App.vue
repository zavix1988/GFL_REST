<template>
  <div id="app">
    <div id="nav">
      <router-link to="/">Cars</router-link>
      <div v-if="authorized" id="authorized">
        <router-link to="/Orders">Orders</router-link>
        <router-link to="/LogOut">LogOut</router-link>
      </div>
      <div v-else id="unauthorized">
        <router-link to="/signup">SignUp</router-link>
        <router-link to="/LogIn">Login</router-link>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<script>
export default {
    name: 'App',
    data(){
        return {
          auth: false
        }
    },
    computed: {
        authorized: function(){
            if(localStorage.token && localStorage.token !== "false"){
                return true;
            }else{
                return false;
            }
        }
    },
    methods:{

    }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  margin-top: 60px;
}
#nav{
  text-align: center;
}
</style>
