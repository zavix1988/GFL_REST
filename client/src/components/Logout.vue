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
                localStorage.token = false;
                this.message = 'OK';
            }
        }
    }
</script>

<style scoped>

</style>