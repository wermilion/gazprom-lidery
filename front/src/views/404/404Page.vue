<template>
    <section>
        <img src="/image/404.svg" alt="">
        <p>ЗАПРАШИВАЕМАЯ СТРАНИЦА НЕ НАЙДЕНА. ВЕРНУТЬСЯ<router-link class="router-link"  to="/">НА ГЛАВНЫЙ ЭКРАН</router-link></p>
    </section>
</template>

<script>
export default{
    name:'404Page'
}
</script>

<style lang="scss" scoped>
section{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin: 0 auto;
    img{
        margin: 57px 0 70px;
        width: 641px;
        height: 505px;
    }
    p{
        margin-bottom: 44px;
        color: #064677;
        font-size: 32px;
        font-weight: 700;
        line-height: 32px;
        
        .router-link{
            font-size: 32px;
            font-weight: 700;
            line-height: 32px; 
            margin-left: 5px;
        }
    }
   
}

</style>