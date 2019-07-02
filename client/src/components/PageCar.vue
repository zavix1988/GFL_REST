<template>
    <div class="car">
        <h1>{{ car.brand }} {{ car.model }}</h1>
        <table>
            <tr>
                <th>Параметр</th>
                <th>характеристика</th>
            </tr>
            <tr>
                <td>Цвет</td>
                <td>{{ car.color }}</td>
            </tr>
            <tr>
                <td>Макс. скорость</td>
                <td>{{ car.max_speed }}</td>
            </tr>
            <tr>
                <td>Объем пихла</td>
                <td>{{ car.displacement }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ car.price }}</td>
            </tr>
            <tr><td colspan="2"><button @click="toBasket">В корзину</button></td></tr>
        </table>
    </div>
</template>

<script>
    import Store from '@/Store';

    export default {
        name: "PageCar",
        data() {
            return {
                car: {
                    brand: null,
                    model: null,
                    color: null,
                    max_speed: null,
                    displacement: null,
                    price: null,
                    token: 'false',

                },
                store: Store
            };
        },
        created() {
            this.token = localStorage.token;
            axios
                .get('http://localhost/GFL_REST/client/api/cars/car/'+this.$route.params.id)
                .then(response => (this.car = response.data)).catch(error => console.log(error));
        },
        methods: {
            toBasket(){
                    this.store.car = this.car;
                    this.$router.push({name: 'BuyCar'});
                }
            }

    }
</script>

<style scoped>

</style>