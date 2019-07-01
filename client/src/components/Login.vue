<template>
    <div id="login_form">
        <div class="error" v-show="error">Ошибка авторизации</div>
        <form @submit.prevent="signin()">
            <div class="form-module">
                <label for="login">Логин</label>
                <input v-model="login" type="text" id="login" name="login" required>
            </div>
            <div class="form-module">
                <label for="password">Пароль</label>
                <input v-model="password" type="text" id="password" name="password" required>
            </div>
            <div class="form-module">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return{
                login: null,
                password: null,
                token: null,
                loginResponse: null,
                error: false
            }
        },
        methods: {
            signin(){
                axios
                    .put(
                        'http://localhost/GFL_REST/server/api/users/login/', 'login='+this.login+'&password='+this.password)
                    .then(response => (
                        localStorage.setItem('token', response.data.token)
                    ));
                setTimeout(() => {
                    if(localStorage.token !== "false"){
                        this.$router.push({name: 'Cars'})
                    }else{
                        this.error = true;
                    }
                }, 500)
            },
        }
    }
</script>

<style scoped>
    .form-module{
        width: 150px;
        display: block;
    }
</style>