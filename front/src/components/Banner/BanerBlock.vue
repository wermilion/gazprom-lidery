<template>
    <section>
        <div class="top_inf">
            <h1>ЛИДЕРЫ </h1>
        </div>
        
        <div class="botton_inf">
            <h1>ГАЗПРОМА</h1>
            <p>
                “Лидеры Газпрома” - это закрытый конкурс для руководителей ООО 
                “Газпром трансгаз Томск” нового поколения, который дает возможность 
                проявить свои лидерские качества и войти в состав привилегированного
                сообщества лучших управленцев компании.
            </p>
        </div>
        <img src="/image/Baner1.png" alt="" class="Baner1">
        <img src="/image/Baner2.png" alt="" class="Baner2">
    </section>
</template>

<script>
export default{
    name:'BanerBlock'
}
</script>


<style lang="scss" scoped>
section{
    margin-top: 0px;
    background-color: #0079C2;
    color: #F5F5F5;
    .Baner1{
        position: absolute;
        top: 248px;
        right: 40px;
        height: 300px;
        width: 300px;
    }
    .Baner2{
        position: absolute;
        top: 550px;
        left: 0;
        height: 400px;
        width: 400px;
    }
    .top_inf{
        h1{
            margin-top: 93px;
            padding-left: 32px;
            margin-bottom: 0;
        }
    }
    .botton_inf{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 913px;
        max-width: 100%;
        margin: 0 auto;
        h1{
            background-color: #F5F5F5;
            color: #1D4573;
            padding:0 19px;
            margin-bottom: 0;
            margin-top: 0;
            
        }  
        p{
            width: 951px;
            font-weight: 400;
            font-size: 30px;
            line-height: 35px;
            margin-bottom: 93px;
            
        }
    }
}
</style>