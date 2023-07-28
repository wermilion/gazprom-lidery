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
                    text:'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.'
                },
                {
                    title: "Анкета и видеоинтервью (до 31 октября)",
                    text: ''
                },
                {
                    title: "Дистанционный этап (ноябрь - декабрь)",
                    text: ''
                },
                 {
                    title: "Управленческие решения (январь 2024 года)",
                    text: ''
                },
                 {
                    title: "Задача (февраль 2024 года)",
                    text: ''
                },
                {
                    title: "Очный этап (март 2024 года)",
                    text: ''
                },
                {
                    title: "Финал (апрель 2024 года)",
                    text: ''
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
        margin-bottom: 112px;
    }
    div{
        width: 1218px;
        max-width: 100%;
        
    }
}

</style>