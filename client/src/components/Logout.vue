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
            if(localStorage.token !== "false"){
                localStorage.token = false;
                this.message = 'OK';
                setTimeout(document.location.reload(), 1000)
            }
        }
    }
</script>

<style scoped>

</style>