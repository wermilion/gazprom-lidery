<template>
    <section>
        <div class="GreadBlock" >
            <GreadBlock v-for="(item, index) in getListWithoutLastItem" :key="index"  :item="item" v-bind:class="'GreadBlock'+index"  ></GreadBlock>
        </div> 
        <div :class="lastItem.statys" class="GreadBlock6">
            <div class="contenerStage1">
                <div class="top ">
                    <h2>{{ lastItem.title }}</h2>
                    <template v-if="lastItem.button">
                        <button>{{ lastItem.button }}</button>
                    </template>
                    <div class="botton_under">
                        <template v-if="lastItem.term">
                            <p class="term">{{ lastItem.term }}</p> 
                        </template>
                        <template v-if="lastItem.info">
                            <p>{{ lastItem.info }}</p>
                        </template>
                    </div>
                </div>
                <div class="between">
                    <p>{{ lastItem.text }}</p>
                </div>
                <div class="botton">
                    <img :src="lastItem.img" alt="">
                </div>
            </div> 
            
        </div> 
    </section>
</template>

<script>
import GreadBlock from './items.vue';
export default{
    name:'StagesCompetitionBlock',
    data: () => {
        return {
            items: [
                {
                    title: "Регистрация",
                    img: '/image/stages/Registration.svg',
                    text:"",
                    button:"приступить",
                    term: "ДОСТУПНО",
                    info: "",
                    statys: "active",
                    router:"/questionnaire_page"
                },
                {
                    title: "Регистрация",
                    img: '/image/stages/Questionnaire.svg',
                    text: 'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.',
                    button: "",
                    term: "ДОСТУПНО",
                    info: "До 31 октября",
                    statys: "inactive",
                    router: ""
                },
                {
                    title: "Регистрация",
                    img: '/image/stages/Remote.svg',
                    text: 'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.',
                    button: "",
                    term: "ДОСТУПНО",
                    info: "До 31 октября",
                    statys: "inactive",
                    router: ""
                },
                {
                    title: "Регистрация",
                    img: '/image/stages/Management.svg',
                    text: 'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.',
                    button: "",
                    term: "ДОСТУПНО",
                    info: "До 31 октября",
                    statys: "inactive",
                    router: ""
                },
                {
                    title: "Регистрация",
                    img: '/image/stages/Task.svg',
                    text: 'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.',
                    button: "",
                    term: "ДОСТУПНО",
                    info: "До 31 октября",
                    statys: "inactive",
                    router: ""
                },
                {
                    title: "Регистрация",
                    img: '/image/stages/InPerson.svg',
                    text: 'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.',
                    button: "",
                    term: "ДОСТУПНО",
                    info: "До 31 октября",
                    statys: "inactive",
                    router: ""
                },
                {
                    title: "Финал",
                    img: '/image/stages/Final.svg',
                    text: 'С помощью CSS можно добавить рамку к элементу несколькими способами. В основном, конечно же, применяется свойство border, как наиболее универсальное, а также outline и, как ни удивительно, box-shadow, основная задача которого — создание тени. Далее рассмотрим эти методы и их различия между собой.',
                    button: "",
                    term: "ДОСТУПНО",
                    info: "До 31 октября",
                    statys:"inactive", 
                    router: ""

                },

            ],
        }
    },
    components:{
        GreadBlock,
    },
    computed:{
        getListWithoutLastItem() {
            return this.items.slice(0, this.items.length - 1);
        },
          lastItem() {
            return this.items[this.items.length - 1];
        }
    }
};

</script>

<style lang="scss" scoped>
section{
    width: 1840px;
    max-width: 100%;
    margin: 0 auto;
    
    .GreadBlock{
        display: grid;
        grid-template-columns: repeat(3, 31.52%);
        grid-template-rows: repeat(2, 400px);
        gap:32px 50px ; 
        
    }
    .inactive{
        pointer-events: none;
        opacity: 0.5;
        background: #F5F5F5;
        }
    .GreadBlock6{
        max-width: 100%;
        width: 1840px;
        height: 400px;
        border: 3px solid #064677;
        margin-top: 32px;
        display: flex;
        .contenerStage1{
            width: 1792px;
            max-width: 100%;
            margin: 24px auto;
            display: flex;
            justify-content: space-between;
            .top{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                h2{
                    border: 2px solid #064677;
                    color: #064677;  
                    font-weight: bold;
                    padding: 32px 32px;
                    
                    font-size: 96px;
                }
                .botton_under{
                    .term{
                        font-size: 24px;
                        font-weight: 700;
                    }   
                }
                button{
                    font-size: 36px;
                    padding: 4px auto;
                    width: 214px;
                }
            }
            .between{
                display: flex;
                align-items: center;
                width: 49%;
                p{
                    width: 767px;
                    height: 202px;
                    border: 1px solid #000;
                }
            }
            .botton{
                display: flex;
                align-items: center;
                img{
                    width: 216px;
                    height: 216px;
                }

            }
        }
        
        
    }
    
   
    
}
</style>