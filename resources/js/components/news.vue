<template>
    <div class="blockNews">
        <div class="siteBackground">
            <p class="backgroundText">
                Новости
            </p>
        </div>
        <div class="newsBackground">
            <div class="newsItems">
                    <div class="newsItem" v-for="news in newsarray">
                        <router-link :to="`/news/${news.id}`">
                        <img src="" alt="" class="newsItemImage">
                        <div class="newsItemInfo">
                            <p class="newsItemDate">{{ news.created_at }}</p>
                            <p class="newsItemName">{{ news.title }}</p>
                        </div>
                        </router-link>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "news",
    data: () => ({
        newsarray: []
    }),
    mounted(){
        this.loadItems();
    },
    methods: {
        loadItems() {
            axios.get('api/news')
                .then(res =>{
                    this.newsarray = res.data;
                })
        }
    }
}
</script>

<style scoped>

</style>
