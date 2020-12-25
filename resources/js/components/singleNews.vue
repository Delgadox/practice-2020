<template>
    <div class="singleNewsBlock" v-if="!not_found">
        <div class="singleNewsContainer">
            <h2>Название:</h2>
            <p class="singeNewsHeader">{{ newsarray.title }}</p>
            <h2>Текст новости:</h2>
            <p class="singleNewsText">{{ newsarray.text }}</p>
            <h2>Дата создания:</h2>
            <p class="singleNewsDate">{{ newsarray.created_at }}</p>
            <div v-if="not_found">hello</div>
        </div>
    </div>

</template>

<script>
import axios from "axios";

export default {
    name: "singleNews",
    data: () => ({
        newsarray: [],
        not_found: false
    }),
    mounted(){
        this.loadNews(this.$route.params.id);
    },
    methods: {
        loadNews(id) {
            axios.get('/api/news/' + id)
                .then(res => {
                    this.newsarray = res.data;
                    console.log(this.newsarray);
                })
            .catch(err => {
                this.not_found = true;
            })
        }
    }
}
</script>

<style scoped>

</style>
