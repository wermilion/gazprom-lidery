<template>
    <section>
        <div class="LEFTdiv">
            <p>&copy; 2023 ООО “Газпром трансгаз Томск” </p>
            <a  class="between1" href="">О конкурсе</a>
            <a class="under" href="">Политика обработки персональных данных</a>
        </div>
        <div class="RIGHTdiv">
            <p>Контактная информация</p>
            <a class="between2" href="">tomsk-tr.gazprom.ru</a>
            <a  href="">+ 7 (3822) 60-32-09</a>
        </div>
    </section>
</template>


<script>
export default{
    name:'FooterBlock'
}
</script>

<style lang="scss" scoped>
section{
    display: flex;
    flex-direction: row;
    width: 100%;
    margin: 0px;
    padding: 0;
    .LEFTdiv{
        margin: 64px 420px 64px 40px;
    }
    .RIGHTdiv{
        margin-top:64px ;
    }
    div{
        display: flex;
        flex-direction: column;
    }
    .between1{
        margin: 24px 0 24px 0;
    }
    .between2{
        margin: 24px 0 24px 0;
    }
    p{
        font-weight: 400;
        font-size: 32px;
        line-height: 38px;
        margin: 0;
    }
    
}
</style>