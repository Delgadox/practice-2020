<template>
    <div class="blockShop">
        <div class="siteBackground">
            <p class="backgroundText" v-if="currentRoute != '/shop'">
                Новинки
            </p>
            <p class="backgroundText" v-if="currentRoute = '/shop'">
                Все товары
            </p>
        </div>
        <div class="shopBackground">
            <div class="shopItems">
                <div class="shopItem" v-for="item in items">
                    <img src="" alt="" class="shopItemImage">
                    <div class="shopItemInfo">
                        <a href="#" class="shopItemCategory">Телефон</a>
                        <p class="shopItemName">{{ item.name }}</p>
                    </div>
                    <div class="shopItemInfo2">
                        <p class="shopItemPrice">{{ item.price }}</p>
                        <div class="shopItemBuy">
                            <a href="#">
                                <img src="/storage/images/buy.svg" alt="купить">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shopMore" v-if="currentRoute != '/shop'">
                <a href="/shop" class="shopMoreButton">
                    Все товары...
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Shop",
    data: () => ({
        items: [],
        currentRoute:[]
    }),
    mounted(){
        this.loadItems();
        this.currentRouteName();
    },

    methods: {
        loadItems() {
            axios.get('api/items')
            .then(res =>{
                this.items = res.data;
            })
        },
        currentRouteName() {
            this.currentRoute = this.$route.path;
        }
    }
}
</script>

<style scoped>

</style>
