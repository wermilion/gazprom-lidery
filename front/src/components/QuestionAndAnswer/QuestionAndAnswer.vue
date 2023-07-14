<template>
    <section>
        <h2>ВОПРОС - ОТВЕТ</h2>
        <div>
            <AcardionItems  v-for="(item, index) in items" :key="index" :item="item"></AcardionItems>
        </div>
    </section>
</template>

<script>
import AcardionItems from '../Acardion/AcardionItems.vue';
export default{
    name:'QuestionAndAnswerBlock',
    data(){
        return{
            items:[
                {
                    title: " "
                },
                {
                    title: " "
                },
                {
                    title: " "
                },
                 {
                    title: " "
                }, 
                {
                    title: " "
                },
            ]
        }
    },
    components:{
        AcardionItems,
    }
}
</script>


<style lang="scss" scoped>
section{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    h2{
        margin-bottom: 64px;
    }
    div{
        width: 1218px;
        max-width: 100%;
    }
}

</style>