<template>
    <div id="car-filter">
        <h4>Фильтр</h4>
        <form class="form" @submit.prevent="getFilter()">
            <div class="form-group">
                <label for="year">Год выпуска</label>
                <input v-model="year" type="text" class="form-control" id="year" name="year" placeholder="Год выпуска" required>
            </div>
            <div class="form-group">
                <label for="brand">Бренд</label>
                <input v-model="brand" type="text" class="form-control" id="brand" name="brand" placeholder="Бренд">
            </div>
            <div class="form-group">
                <label for="model">Модель</label>
                <input v-model="model" type="text" class="form-control" id="model" name="model" placeholder="Модель">
            </div>
            <div class="form-group">
                <label for="color">Цвет</label>
                <input v-model="color" type="text" class="form-control" id="color" name="color" placeholder="Цвет">
            </div>
            <div class="form-group">
                <label for="max_speed">Максимальная скорость</label>
                <input v-model="max_speed" type="text" class="form-control" id="max_speed" name="max_speed" placeholder="Максимальная скорость">
            </div>
            <div class="form-group">
                <label for="min_displacement">Объем пихла от</label>
                <input v-model="min_displacement" type="text" class="form-control" id="min_displacement" name="min_displacement" placeholder="Объем пихла от">
            </div>
            <div class="form-group">
                <label for="max_displacement">Объем пихла до</label>
                <input v-model="max_displacement" type="text" class="form-control" id="max_displacement" name="max_displacement" placeholder="Объем пихла до">
            </div>
            <div class="form-group">
                <label for="min_price">Стоимость от</label>
                <input v-model="min_price" type="text" class="form-control" id="min_price" name="min_price" placeholder="Стоимость от">
            </div>
            <div class="form-group">
                <label for="max_price">Стоимость до</label>
                <input v-model="max_price" type="text" class="form-control" id="max_price" name="max_price" placeholder="Стоимость до">
            </div>
            <button type="submit" class="btn btn-secondary">Посмотреть</button>
        </form>
    </div>
</template>

<script>
    import EventBus from '@/EventBus';


    export default {
        name: "car-filter",
        data(){
            return{
                year: '',
                brand: '',
                model: '',
                color: '',
                max_speed: '',
                min_displacement: '',
                max_displacement: '',
                min_price: '',
                max_price: '',
                data: null
            }
        },

        methods: {
            getFilter() {
                axios
                    .get('http://localhost/GFL_REST/server/api/cars/filter/?year='+this.year+'&brand='+this.brand+'&model='+this.model+'&color='+this.color+'&max_speed='+this.max_speed+'&min_displacement='+this.min_displacement+'&max_displacement='+this.max_displacement+'&min_price='+this.min_price+'&max_price='+this.max_price)
                    .then(response => (EventBus.$emit('carFilter', response.data )));
            }
        }
    }
</script>

<style scoped>

</style>