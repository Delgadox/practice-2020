import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import main from "./components/main";
import shop from "./components/shop";
import news from "./components/news";
import singleNews from "./components/singleNews";
import createNews from "./components/createNews";
import createItem from "./components/createItem";
import createCategory from "./components/createCategory";
import admin from "./components/admin";
import search from "./components/search";

const routes = [
    {
        path: '/',
        component: main
    },
    {
        path: '/shop',
        component: shop
    },
    {
        path: '/new',
        component: news
    },
    {
        path: '/news/:id',
        component: singleNews
    },
    {
        path: '/createNews',
        component: createNews
    },
    {
        path: '/createItem',
        component: createItem
    },
    {
        path: '/createCategory',
        component: createCategory
    },
    {
        path: './search',
        component: search
    },
    {
        path: './admin',
        component: admin
    }
]

export default new vueRouter(
    {
        mode: "history",
        routes
    });

