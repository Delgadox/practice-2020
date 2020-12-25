<template>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Название товара:</label>
            <input type="text" class="form-control" v-model="form.title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введить название новости">
        </div>
        <div class="form-group">
            <label for="inputPrice" >Введите цену на товар:</label>
            <input type="text" class="form-control" v-model="form.price" id="inputPrice" aria-describedby="emailHelp" placeholder="Введить название новости">
        </div>
        <div class="form-group">
            <label for="inputPrice" >Введите цену на товар:</label>
<!--            <select name="category" id="inputcategory" v-model="form.category">-->
<!--                <option v-for="category in categoryarray" :value="category.id">{{ category.name }}</option>-->
<!--            </select>-->
<!--            <v-select label="category" v-model="form.category" :options="categoryarray"></v-select>-->
        </div>

        <button type="submit" class="btn btn-primary" @click.prevent="store">Сохранить</button>
    </form>
</template>

<script>
import axios from "axios";
import news from "./news";


export default {
    name: "createItems",
    components: {},
    data: () => ({
        form: {
            title: "",
            price: "",
            category:""
        },
        categoryArray:[]
    }),
    mounted(){
        this.getCategory();
    },
    methods: {
        getCategory() {
            axios.get('api/category')
                .then(res =>{
                    this.categoryArray = res.data;
                    console.log(this.categoryArray);
                })
        },
        store(){
            axios.post('/api/items', this.form, {
                headers: {
                    'Content-type': 'application/json'
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/shop');
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
