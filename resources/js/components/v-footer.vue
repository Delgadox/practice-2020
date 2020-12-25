<template>
    <div class="footerBlock">
        <div class="footerMenu">
            <p class="footerMenuText">
                Меню
            </p>
            <a v-for="link in links" :href="link.href" class="footerMenuLink">{{ link.title }}</a>
        </div>
        <div class="footerCopyright">copyright 2020</div>
        <div class="footerSocial">
            <a v-for="social in socials" :href="social.href" class="footerSocialLink"><img class="footerSocialImage" v-bind:src="social.image" alt="facebook"></a>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-footer",
    data(){
        return{
            links: [
                {
                    title: "Каталог",
                    href: "/shop"
                },
                {
                    title: "Избранное",
                    href: "/"
                },
                {
                    title: "Корзина",
                    href: "/"
                }
            ],
            socials: [
                {
                    image: "/storage/images/facebook.svg",
                    href: "/"
                },
                {
                    image: "/storage/images/instagram.svg",
                    href: "/"
                },
                {
                    image: "/storage/images/twitter.svg",
                    href: "/"
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
