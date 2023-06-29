<template>
    <section>
        <div class="left">
            <img src="/image/Baner2.png" alt="">
        </div>
        <div class="right">
            <h2>ВХОД В КАБИНЕТ</h2>
            <form>
                <input type="text" pattern="Табельный номер ">
                <input type="text" pattern="Пароль"> 
            </form>
            <button>Войти</button>
            
        </div>
    </section>
</template>


<script>
export  default{
    name: "EntranceBlock",

}
</script>


<style lang="scss" scoped>
section{
    margin-top: 109px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    color: #064677;
    h2{
        font-size: 48px;
        font-weight: 400;
        line-height: 52px;
    }
    div{
        height: 594px;
        width: 594px;
    }
    .left{
        background-color: #3394CE;
    }
    .right{
        box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        form{
            display: flex;
            flex-direction: column;

        }
    }
    button{
        border:4px solid #3394CE;
        color: #064677;
        background-color: white;
    }
}


</style>