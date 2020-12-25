<template>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Название новости</label>
            <input type="text" class="form-control" v-model="form.title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введить название новости">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" >Введите текст новости</label>
            <textarea class="form-control" v-model="form.text" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="store">Сохранить</button>
    </form>
</template>

<script>
import axios from "axios";
import news from "./news";


export default {
name: "createNews",
    components: {},
    data: () => ({
        form: {
            title: "",
            text: ""
        },
    }),
    methods: {
        store(){
            axios.post('/api/news', this.form, {
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
