<template>
    <div id="user-orders">
        <table>
            <tr>
                <th>Бренд</th>
                <th>Модель</th>
                <th>Дата заказа</th>
            </tr>
            <order v-for="(order, key) in orders"
                   :order = "order"
                   :key = "key"
            ></order>
        </table>
    </div>
</template>

<script>
    import Order from './Order'
    export default {
        name: "Orders",
        data(){
            return{
                authorized: null,
                token: null,
                orders: {}
            }
        },
        mounted(){
            this.checkAuth();
            if(this.authorized){
                axios.get('http://localhost/GFL_REST/server/api/orders/AllOrders/token/'+this.token)
                    .then(response => (
                        this.orders = response.data
                    ));
            }else{
                this.$router.push({name: 'Login'})
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