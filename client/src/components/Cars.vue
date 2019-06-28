<template>
    <div id="cars">

    <table>
        <tr>
            <th>num</th>
            <th>brand</th>
            <th>model</th>
        </tr>
        <car v-for="(car, key) in cars"
             :car="car"
             :key="key"
        ></car>
    </table>
    </div>
</template>

<script>
import Car from './Car';

export default {
    name: "Cars",
    data() {
        return {
            cars: null,
        };
    },
    methods:{

    },
    created() {
        axios
            .get('http://localhost/GFL_REST/client/api/cars/allcars')
            .then(response => (this.cars = response.data)).catch(error => console.log(error));
    }
}
</script>

<style scoped>

</style>