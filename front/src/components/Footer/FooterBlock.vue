<template>
    <section>
        <div class="mainContener">
            <div class="LEFTdiv">
                <p>&copy; 2023 ООО “Газпром трансгаз Томск” </p>
                <a  class="between1" target="_blank" href="PDF/contest.pdf" >О конкурсе</a>
                <a class="under" target="_blank" href="PDF/Gasprom.pdf" >Политика обработки персональных данных</a>
            </div>
            <div class="RIGHTdiv">
                <p>Контактная информация</p>
                <a class="namber" >+ 7 (3822) 60-32-09</a>
                <a class="between2" target="_blank" href="https://tomsk-tr.gazprom.ru/">tomsk-tr.gazprom.ru</a>
            </div>
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
    
    width: 100%;
    
    padding: 0;
    div{
        display: flex;
        flex-direction: row;
         .LEFTdiv{
        margin: 40px 374px 40px 40px;
    }
    .RIGHTdiv{
        margin-top:40px ;
        .namber{
            margin-top: 24px;
            color: black;
        }
        
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
   
    
}
@media screen and (max-width :1024px) {
    section{
        display: flex;
        flex-direction: column;
        .RIGHTdiv{
            align-items: flex-end;
            margin: 0px 20px 64px 40px;
        }
    }
}
</style>