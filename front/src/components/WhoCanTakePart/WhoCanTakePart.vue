<template>
    <section>
        <h2>КТО МОЖЕТ ПРИНЯТЬ УЧАСТИЕ</h2>
        <div class="shell">
            <div v-for="(item, index) in title" :key="index">
                <img src="/image/who_can_take/star.svg" alt="">
                <p>{{ item.title }}</p>
            </div>
            <img class="line" src="/image/who_can_take/Line 10.svg" alt="">
        </div>
    </section>
</template>

<script>

export default{
    name:'WhoCanTacePart',
   data(){
    return{
        title:[
            {
                title:'Сотрудник со стажем работы не менее 3-х лет в Компании'
            },
            {
                title: 'Имеющий опыт реализации проектов: социальных, развивающих, спортивных'
            },
            {
                title: 'В возрасте до 45 лет включительно'
            },
            {
                title: 'Наличие высшего образования или обучение в вузе на данный момент'
            }
        ]
    }
   }
}
</script>


<style lang="scss" scoped>


section{
    text-align: center;
    
    h2{
        margin-top: 56px;
    }   
    .shell{
        height: 464px;
        margin: 32px 0 56px ;
        display: flex;
        justify-content: space-around;
        position: relative;
        .line{
            position: absolute;
            top:34%;
        }
        div{
            text-align: center;
            p{
                width: 368px;
                color: #1D4573;
                font-size: 32px;         
                font-weight: 400;
            }
        }
        
        
    }
}

</style>