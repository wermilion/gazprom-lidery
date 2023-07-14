<template>
    <section class="mainContener">
        <div class="shell ">
            <button v-on:click="Manual" class="top">
                <p>Шаг 1 - Инструкция</p>
                <img v-bind:class="{  'text-ratate-img1': this.manual }"  src="/image/Vector 1.png" alt="" >
            </button>
            <button v-on:click="Questionnair" class="under">
                <div v-for="(item, index) in text" :key="index" >
                    <p v-if=" $route.name == item.name" >Шаг 2 - {{ item.title }}</p>
                </div>
                <img v-bind:class="{ 'text-ratate': questionnair }"  src="/image/Vector 1.png" alt="">
            </button>
        </div>
        <div v-if="$route.name == 'QuestionnairePage'" class="Tab">
            <ManualBlock 
                @chect="Checkbox1"
                :checkbox_items="checkbox" 
                @questionnaire_tab="Questionnair" 
                v-show="manual"
                >
            </ManualBlock>
            <QuestionnaireBlock v-show="questionnair"></QuestionnaireBlock>
        </div>
        <div v-if="$route.name == 'TaskPage'" class="tab">
            <ManualBlock @chect="Checkbox1" :checkbox_items="checkbox"  @questionnaire_tab="Questionnair" v-show="manual"></ManualBlock>
            <TackBlock v-show="questionnair"></TackBlock>
        </div>
        <div v-if="$route.name == 'ManagmentPage'" class="Tab">
            <ManualBlock @chect="Checkbox1" :checkbox_items="checkbox"  @questionnaire_tab="Questionnair" v-show="manual"></ManualBlock>
            <ManagementBlock v-show="questionnair"></ManagementBlock>
        </div>
        
    </section>
</template>

<script>
import QuestionnaireBlock from '@/components/Questionnaire/QuestionnaireBlock.vue';
import ManualBlock from '@/components/Manual/ManualBlock.vue';
import TackBlock from '@/components/Task/TaskBlok.vue'
import ManagementBlock from '@/components/ManagementBlock/ManagementBlock.vue';

export default{
    name: "QuestionnairePage",
    components:{
        ManualBlock,
        QuestionnaireBlock,
        TackBlock,
        ManagementBlock
    },
    data(){
        return{
            manual:true,
            questionnair:false,
            checkbox:false,
            text:[
                {
                    title:"Анкета",
                    name:'QuestionnairePage'
                },
                {
                    title: "Задача",
                    name: 'TaskPage'
                },
                {
                    title: "Управленческие решения",
                    name: 'ManagmentPage'
                }
            ],
           
           
        }
    }, 
  
    methods:{
        Manual(){
            this.manual=!this.manual
            if (this.checkbox) {
                this.questionnair = !this.questionnair
                
            }
        },
        Ratate(){
            this.rotate = !this.rotate
        },
        Questionnair(){
            if(this.checkbox){
                this.questionnair=!this.questionnair
                this.manual = !this.manual
               
                
            }
        },
        Checkbox1(){
            this.checkbox=!this.checkbox
            
        }
           
    }
}
</script>

<style lang="scss" scoped>

section{
    flex: 1;
    .shell{
        
        margin: 32px auto;
        display: flex;
        p{
            
            
            margin-right: 24px;
            color: #064677;
        }   
        img{
            transform: rotate(180deg);
            width: 40px;
            height: 20px;
        }

        .top,.under{
            background-color: white;
            display: flex;
            align-items: center;
            font-size: 52.5px;  
            font-weight: 700;  
            border: 3px solid #064677;
            padding: 12px 32px;
            .text-ratate-img1{
                transform: rotate(0deg);
            }
            .text-ratate{
                transform: rotate(0deg);
            }

        }
    
        .top{
           margin-right: 148px; 
        }
    }

}
</style>