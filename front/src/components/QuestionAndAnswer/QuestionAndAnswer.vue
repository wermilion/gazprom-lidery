<template>
    <section>
        <h2>ВОПРОС - ОТВЕТ</h2>
        <div>
            <AcardionItemsQuestion  v-for="(item, index) in items" :key="index" :item="item"></AcardionItemsQuestion>
        </div>
    </section>
</template>

<script>
import AcardionItemsQuestion from '../Acardion/AcardionItemsQuestion.vue';
export default{
    name:'QuestionAndAnswerBlock',
    data(){
        return{
            items:[
                {
                    title:'Как можно принять участие в конкурсе?',
                    p:"",
                    li1: "Кандидату на участие в конкурсе необходимо пройти процедуру регистрации на цифровой площадке конкурса. ",
                    li2:'Изучить регламентирующие документы по организации и проведению конкурса. Положение о конкурсе',
                    router:'здесь.',
                  
                    
                },
                {
                    title: 'Из каких этапов состоит конкурс?',
                    p:"Конкурс состоит из 2-х основных этапов:",
                    li1:'Этап 1 - Дистанционный.',
                    li2:' Этап 2 - Очный.',
                  
                },
                {
                    title: 'По каким принципам будем проводиться оценка?',
                    li1: 'Критерием оценки участников является уровень проявления ими общих знаний, интеллектуальных способностей управленческого потенциала, лидерских качеств и профессиональных компетенциий в ходе выполнения заданий Конкурса на конкурентной основе.',
                    li2: 'В ходе Конкурса участники выполняют задания и проходят комплексную оценку общих знаний, интеллектуальных способностей, управленческого потенциала, лидерских качеств и профессиональных компетенций.',
                    li3: "По результатам выполнения заданий участник получает баллы, формирующие значения его индивидуального рейтинга.",
                    li4:"Победителями каждого этапа Конкурса становятся участники, имеющие наиболее высокие значения рейтинга."
                },
               
            ]
        }
    },
    components:{
        AcardionItemsQuestion,
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
        margin-bottom: 32px;
    }
    div{
        width: 1218px;
        max-width: 100%;
        
    }
}

</style>