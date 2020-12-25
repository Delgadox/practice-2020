<template>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Название категории:</label>
            <input type="text" class="form-control" v-model="form.name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введить название категории">
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
            name: ""
        },
        categoryArray:[]
    }),
    mounted(){
        this.getCategory();
    },
    methods: {
        store(){
            axios.post('/api/category', this.form, {
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
