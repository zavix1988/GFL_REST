<template>
    <div>
        {{ message }}
    </div>
</template>

<script>
    export default {
        name: "logout",
        data(){
          return{
              message: ''
          }
        },
        mounted(){
            if(localStorage.token){
                localStorage.removeItem('token');
                this.message = 'OK';
            }
        }
    }
</script>

<style scoped>

</style>