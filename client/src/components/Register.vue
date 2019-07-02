<template>
    <div id="register">
        <form @submit.prevent="register()">
            <div class="form-module">
                <label for="first_name">Имя</label>
                <input v-model="first_name" type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-module">
                <label for="last_name">Фамилия</label>
                <input v-model="last_name" type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-module">
                <label for="login">Логин</label>
                <input v-model="login" type="text" id="login" name="login" required>
            </div>
            <div class="form-module">
                <label for="email">Почта</label>
                <input v-model="email" type="email" id="email" name="email" required>
            </div>
            <div class="form-module">
                <label for="password">Пароль</label>
                <input v-model="password" type="password" id="password" name="password" required>
            </div>
            <div class="form-module">
                <label for="retry">Подтверждение</label>
                <input v-model="retry" type="password" id="retry" name="retry" required>
            </div>
            <div class="form-module">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Register",
        data(){
            return{
                errors: [],
                first_name: null,
                last_name: null,
                login: null,
                email: null,
                password: null,
                retry: null,
            }
        },
        methods: {
            register(){
                axios
                    .post(
                        'http://localhost/GFL_REST/server/api/users/signup/', 'first_name='+this.first_name
                                                                                +'&last_name='+this.last_name
                                                                                +'&login='+this.login
                                                                                +'&email='+this.email
                                                                                +'&password='+this.password
                                                                                +'&retry='+this.retry)
                    .then(response => (
                        this.$router.push({name: 'Login'})
                    ));
            }
        }
    }
</script>

<style scoped>
    .form-module{
        width: 150px;
        display: block;
    }
</style>