<template>
    <tr>
        <td>{{brand}}</td>
        <td>{{model}}</td>
        <td>{{time}}</td>
    </tr>
</template>

<script>
    export default {
        name: "Order",
        props: ['order'],
        computed: {
            brand(){
                return this.order.name;
            },
            model(){
                return this.order.model;
            },
            time(){
                let a = new Date(this.order.time * 1000);
                let months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                let year = a.getFullYear();
                let month = months[a.getMonth()];
                let date = a.getDate();
                let time = date + ' ' + month + ' ' + year;
                return time;
            }
        }
    }
</script>

<style scoped>

</style>