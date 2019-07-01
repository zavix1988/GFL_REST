<template>
    
</template>

<script>
    export default {
        name: "Orders",
        data(){
            return{
                authorized: null,
                token: null

            }
        },
        mounted(){
            this.checkAuth();
            if(this.authorized){
                axios.get('http://localhost/GFL_REST/server/api/orders/AllOrders/token/'+this.token)
                    .then(response => (console.log(response)));
            }
        },
        methods:{
            checkAuth(){
                if(localStorage.token && localStorage.token !== "false"){
                    this.token = localStorage.token;
                    this.authorized = true;
                }else{
                    this.authorized = false
                }
            }
        }
    }
</script>

<style scoped>

</style>