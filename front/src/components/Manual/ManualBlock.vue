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
                <div class="checkbox2"  v-on:click="$emit('chect')">
                    <img v-show="checkbox_items" src="/image/checkbox.svg" alt="">
                </div>
                <div v-for="(items, index) in questionnaire_tab" :key="index">
                    <label  v-if="$route.name == items.names">{{ items.text }}</label>
                </div>
                
            </div>
            <button :class="{'disable':!checkbox_items}" v-on:click="$emit('questionnaire_tab')">Далее</button>
        </div>
        
    </section>
</template>


<script>

export default{
    name:'ManualBlock',
    props: ['checkbox_items','item'],
    data(){
        return{
            error:false,
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
    },
    
     

    
}
</script>

<style lang="scss" scoped>

section{
    margin-bottom: 56px;
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
            font-size: 32px;
        }
    }
    .under{
        display: flex;
        justify-content: space-between;
        align-items: center;
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
                cursor: pointer;
                 width: 50px;
                height: 50px;
                border: 2px solid #064677;
                margin-right: 32px;
            }
        }
        .disable{
            background: #E7E8E5;
            color: white;
            pointer-events: none;
        }
        button{
            
            height: 74px;
            font-size: 36px;
            
           
             .router{
               background-color: none;
               color: white;
                
            }
        }
        button:hover{
            background: #064677;
        }
    }
}
</style>