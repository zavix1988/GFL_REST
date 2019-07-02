<template>
    <div id="cars" class="clearfix">
        <car-filter></car-filter>
        <table class="cars-result">
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
import CarFilter from './CarFilter'
import EventBus from '@/EventBus';

export default {
    name: "Cars",
    data() {
        return {
            cars: null,
            example: null
        };
    },
    methods:{
        getFilter(cars) {
            this.cars = cars;
        }
    },
    created() {
        axios
            .get('api/cars/allcars')
            .then(response => (this.cars = response.data)).catch(error => console.log(error));
        EventBus.$on('carFilter', this.getFilter);
    }
}
</script>

<style scoped>

.cars-result{
    margin-left: 500px;
}
.clearfix::after {
    content: "";
    display: table;
    clear: both;
}
</style>