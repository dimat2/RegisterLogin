<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Register
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
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Neved" v-model="name">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Felhasználónév" v-model="email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Jelszó" v-model="password">
                        </div>

                        <div class="form-group">
                            <label>Password again</label>
                            <input type="password" class="form-control" placeholder="Jelszó ismét" v-model="passwordAgain">
                        </div>

                        <button class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "register",
        data() {
            return {
                email: "",
                name: "",
                password: "",
                passwordAgain: "",
                errors: []
            }
        },
        methods: {
            onSubmit() {
                this.errors = []

                if (!this.name) {
                    this.errors.push("Add meg a neved!")
                }

                if (!this.email) {
                    this.errors.push("Add meg a felhasználóneved!")
                }

                if (!this.password) {
                    this.errors.push("Add meg a jelszavad!")
                }

                if (!this.name) {
                    this.errors.push("Add meg ismét a jeszavad!")
                }

                if (this.password !== this.passwordAgain) {
                    this.errors.push("A jelszavak nem egyeznek!")
                }

                if (this.errors.length == 0) {
                    const data = {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }

                    axios.post("http://localhost/LaraVue/public/auth/register", data)
                        .then(res => {
                            this.$store.state.user = res.data
                            this.$router.push("/")
                        })
                }
            }
        }
    }
</script>