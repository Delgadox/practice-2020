<template>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/createNews">Создать новость</a>
            <a class="nav-link active" aria-current="page" href="/createItem">Создать товар</a>
            <a class="nav-link active" aria-current="page" href="/createCategory">Создать категорию</a>
        </li>
    </ul>
</template>

<script>
export default {
    name: "admin",
    data() {
        return {
            links: [
                {
                    title: "Создать новость",
                    href: "/createNews"
                },
                {
                    title: "Создать товар",
                    href: "/createItem"
                },
                {
                    title: "Создать категорию",
                    href: "/createCategory"
                }
            ],
        }
    }
}
</script>

<style scoped>

</style>
