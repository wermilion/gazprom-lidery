<template>
    <div v-if="!isConsented" class="cookie-consent">
        <p>Мы используем<router-link to="" class="router">файлы cookie,</router-link>чтобы улучшить сайт для вас</p>
        <button @click="consent">Согласен</button>
    </div>     
</template>

<script>
export default{
    name:'CookeisBlock',
     data() {
        return {
            isConsented: false
        };
    },
    methods: {
        consent() {
            this.isConsented = true;
            localStorage.setItem('cookieConsent', true); 
        }
    },
    mounted() {
        if (localStorage.getItem('cookieConsent')) {
            this.isConsented = true;
        }
    }
}

</script>

<style lang="scss" scoped>

.cookie-consent {
    position: fixed;
    bottom: 10px;
    left: 25%;
    right: 25%;
    width: 1016px;
    max-width: 100%;
    background-color: #E7E8E5;
    color: #064677;
    padding: 17px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    p{
        font-size: 32px;

        .router{
            color: #0079C2;
            margin: 0 4px;
        }
    }
    button{
        font-size: 24px;
        margin-left: 28px;
        padding: 8px 24px;
    }


}
</style>