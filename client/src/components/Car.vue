<template>
    <tr>
        <td>{{id}}</td>
        <td>{{brand}}</td>
        <td>{{model}}</td>
        <td><button @click="openCar()">Get</button></td>
    </tr>
</template>

<script>
    export default {
        props: ['car'],
        computed: {
            id() {
                return this.car.id;
            },
            brand() {
                return this.car.brand;
            },
            model() {
                return this.car.model;
            }
        },
        methods: {
            openCar(){
                this.$router.push({name: 'PageCar', params: {id: this.car.id}})
            }
        }
    }
</script>

<style scoped>

</style>