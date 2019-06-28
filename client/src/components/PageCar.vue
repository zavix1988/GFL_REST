<template>
    <h1>{{ car }}</h1>
</template>

<script>
    export default {
        name: "PageCar",
        data() {
            return {
                car: null,
            };
        },
        created() {
            axios
                .get('http://localhost/GFL_REST/client/api/cars/car/'+this.$route.params.id)
                .then(response => (this.car = response.data)).catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>