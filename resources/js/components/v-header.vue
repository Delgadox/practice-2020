<template>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <router-link class="navbar-brand" :to="logo.href">{{ logo.title }}</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Поиск..." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Найти</button>
                        </form>
                    </div>
<!--                    <div class="cityChoose">-->
<!--                        <a href="#" class="cityLink">Санкт-Петербург</a>-->
<!--                    </div>-->
                    <ul class="navbar-nav">
                        <li class="nav-item" v-for="link in links">
                            <router-link class="nav-link active" aria-current="page" :to="link.href">{{ link.title }}</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
import axios from "axios";

export default {
    name: "v-header",
    components: {},
    data(){
        return{
            links: [
                {
                    title: "Каталог",
                    href: "/shop"
                },
                {
                    title: "Избранное",
                    href: "#"
                },
                {
                    title: "Корзина",
                    href: "#"
                }
            ],
            logo:{
                title: "LOGO",
                href: "/"
            },
            form: {
                title: "",
                text: ""
            },
        }
    },
    methods: {
        store(){
            axios.post('/api/search', this.form, {
                headers: {
                    'Content-type': 'application/json'
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/news/' + res.data.post.id);
                    }
                })
                .catch(err => {
                    console.log(err.response.data)
                })
        }
    }
}
</script>

<style scoped>

</style>
