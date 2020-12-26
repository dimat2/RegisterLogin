<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <div class="col-md-6 offset-md-3">
                    <form v-on:submit.prevent="onSubmit">
                        <div class="alert alert-danger" v-if="errors.length">
                            <ul class="mb-0">
                                <li v-for="(error, index) in errors" :key="index"> {{error }}</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Felhasználónév" v-model="email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Jelszó" v-model="password">
                        </div>

                        <button class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "login",
        data() {
            return {
                email: "",
                password: "",
                errors: []
            }
        },
        methods: {
            onSubmit() {
                this.errors = []

                if (!this.email) {
                    this.errors.push("Add meg az email címedet!")
                }

                if (!this.password) {
                    this.errors.push("Add meg a jelszavad!")
                }

                if (!this.errors.length) {
                    const data = {
                        email: this.email,
                        password: this.password
                    }

                    axios.post("http://localhost/LaraVue/public/auth/login", data)
                        .then(res => {
                            this.$store.state.user = res.data
                            this.$router.push("/")
                        })
                }
            }
        }
    }
</script>