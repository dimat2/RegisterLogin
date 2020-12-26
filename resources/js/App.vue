<template>
    <div>
        <navbar class="mb-2"></navbar>

        <spinner v-if="loading"></spinner>
        <div v-else-if="initiated">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Navbar from './components/Navbar'

    export default {
        name: "app",
        components: {
            Navbar
        },
        data() {
            return {
                loading: false,
                initiated: false
            }
        },
        mounted() {
            this.init()
        },
        methods: {
            init() {
                this.loading = true

                axios.get("http://localhost/LaraVue/public/auth/init")
                    .then(res => {
                        this.$store.state.user = res.data.user
                        this.loading = false
                        this.initiated = true
                    })
            }
        }
    }
</script>