<template>
    <section>
        <h2> УЧАСТИЕ ДАЕТ ВОЗМОЖНОСТЬ</h2>
        <div>
            <itemsWho v-for="(item, index) in items" :key="index" :item="item" class="ItemsWho"></itemsWho>
        </div>

    </section>
</template>

<script>
import itemsWho from './items.vue'
export default{
    name:'OpprtunitiesBlock',
     components: {
        itemsWho,
    },
    data: () => {
        return {
            items: [
                {
                    img:'/image/possibility/education.svg',
                    title: 'Получить образовательный грант на обучение'
                },
                {
                    img: '/image/possibility/ruble.svg',
                    title: 'Получить финансовую поддержку в реализации собственного социального проекта'
                },
                {
                    img: '/image/possibility/mentor.svg',
                    title: 'Получить наставника из лица руководителей Администрации и ТОП - менеджмента Общества'
                },

            ],
        }
    },
}
</script>


<style lang="scss" scoped>
section{
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width:1546px ;
    width:100% ;
    margin: 0 auto;
    h2{
        margin-top: 56px;
    }
    div{
        
        display: flex;
        width: 100%;
        justify-content: space-between;
        margin-top: 32px;
         .ItemsWho{
                width: 32.5%;
            }
    }
    @media screen and (max-width :1024px) { 
        div{
            display: flex;
            flex-direction: column;
            .ItemsWho{
                margin-top: 20px;
            }
            
        }
    }
}
</style>