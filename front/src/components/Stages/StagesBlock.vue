<template>
    <section>
        <h2>ЭТАПЫ КОНКУРСА</h2>
        <div>
            <AcardionItems v-for="(item, index) in items" :key="index" :item="item"></AcardionItems>
        </div>
    </section>
</template>


<script>
import AcardionItems from '../Acardion/AcardionItems.vue';
export default {
    name: 'StagesBlock',
    components:{
        AcardionItems,
    },
    data: () => {
        return {
            items: [
                {
                    title: "Регистрация (до 20 октября)",
                    text:'Регистрация осуществляется путем первой авторизации на платформе.'
                },
                {
                    title: "Анкета и видеоинтервью (до 31 октября)",
                    text: 'Состоит из заполнения анкеты и загрузки видеоинтервью с ответами на заданные вопросы.'
                },
                {
                    title: "Дистанционный этап (ноябрь - декабрь)",
                    text: 'Состоит из тестов для определения уровня развития компетенций, способностей участников, которые проводятся на платформе АНО “Россия - страна возможностей”.'
                },
                 {
                    title: "Управленческие решения (январь 2024 года)",
                    text: 'Состоит из описания управленческого опыта участника на примере одного кейса.'
                },
                 {
                    title: "Задача (февраль 2024 года)",
                    text: 'Состоит из управленческой задачи, предложенной директором компании.'
                },
                {
                    title: "Очный этап (март 2024 года)",
                    text: 'Проходит вне платформы в г. Томск, где будет проведена комплексная оценка управленческих и лидерских качеств.'
                },
                {
                    title: "Финал (апрель 2024 года)",
                    text: 'Проходит вне платформы в г. Томск, где будет завершение конкурса с награждением победителей.'
                },

            ],
        }
    },
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