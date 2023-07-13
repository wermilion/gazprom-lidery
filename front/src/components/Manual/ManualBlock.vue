<template>
    <section>
        <div class="top">
            <div v-for="(item, index) in questionnaire_tab" :key="index">
                <p v-if="$route.name == item.names">{{ item.title }}</p>
            </div>
            <p></p>
        </div>
        <div class="under">
            <div class="checkbox1" >
                <div class="checkbox2" v-on:click="$emit('Checkbox1')">
                    <img v-show="checkbox" src="/image/checkbox.png" alt="">
                </div>
                <div v-for="(items, index) in questionnaire_tab" :key="index">
                    <label  v-if="$route.name == items.names">{{ items.text }}</label>
                </div>
                
            </div>
            <button v-on:click="$emit('Questionnair')">Далее</button>
        </div>
        
    </section>
</template>


<script>
export default{
    name:'ManualBlock',
    props: ['checkbox'],
    data(){
        return{
            questionnaire_tab: [
                {
                    title: 'Здесь будет инструкция',
                    text: 'Я изучил (-а) инструкцию, загрузил (-а) видеоинтервью.',
                    names: 'QuestionnairePage'
                },

                {
                    title: 'Здесь будет инструкция',
                    text: 'Я изучил (-а) инструкцию.',
                    names: 'TaskPage'
                },

                {
                    title: 'Здесь будет инструкция',
                    text: 'Я изучил (-а) инструкцию.',
                    names: 'ManagmentPage'
                }
            ]
        }
    }
     

    
}
</script>

<style lang="scss" scoped>
section{
    
    box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);
    padding-top: 40px;
    .top{
        
        max-width: 100%;
        margin: 40px auto;
        width: 1530px;
        height: 699px;
        border: 1px solid #000;
        p{
            margin: 40px;
        }
    }
    .under{
        display: flex;
        justify-content: space-between;
        margin: 0px auto;
        width: 1530px;
        max-width: 100%;
        .checkbox1{
            margin: 40px 0;
            display: flex;
            align-items: center;
            label{
                color: #000;
                font-size: 32px;
            }
            .checkbox2{
                 width: 50px;
                height: 50px;
                border: 2px solid #064677;
                margin-right: 32px;
            }
        }
        button{
            
            height: 74px;
            font-size: 36px;
            
           
             .router{
               background-color: none;
               color: white;
                
            }
        }
    }
}
</style>