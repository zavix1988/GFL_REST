<template>
    <div class="car">
        <h1>{{ store.car.brand }} {{ store.car.model }}</h1>
        <table>
            <tr>
                <th>Параметр</th>
                <th>характеристика</th>
            </tr>
            <tr>
                <td>Цвет</td>
                <td>{{ store.car.color }}</td>
            </tr>
            <tr>
                <td>Макс. скорость</td>
                <td>{{ store.car.max_speed }}</td>
            </tr>
            <tr>
                <td>Объем пихла</td>
                <td>{{ store.car.displacement }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ store.car.price }}</td>
            </tr>
            <tr>
                <td>Способ оплаты</td>
                <td><select v-model="payment">
                    <option value="credit_cart">Карта</option>
                    <option value="cash">Наличные</option>
                </select></td>
            </tr>
            
            <tr><td colspan="2"><button @click="buy">Купить</button></td></tr>
        </table>
        {{ result }}
    </div>
</template>

<script>
    import Store from "@/Store";

    export default {
        name: "BuyCar",
        data(){
            return{
                store: Store,
                payment: '',
                token: false,
                result: ''
            }
        },
        mounted(){
            this.token = localStorage.token;
        },
        methods: {
            buy(){
                axios
                    .put('http://localhost/GFL_REST/server/api/orders/buycar', 'token='+this.token+'&id='+this.store.car.id+'&payment='+this.payment)
                    .then(response => (
                        this.store.car = {},
                        this.result = 'Success'
                    )).catch(error => (
                        this.chechAuth(error.response.status),
                        this.result = 'Error'
                ));
            },
            chechAuth(code) {
                if (code == '401') {
                    this.$router.push({name: 'Login'})
                }
            }
        }
    }
</script>

<style scoped>

</style>