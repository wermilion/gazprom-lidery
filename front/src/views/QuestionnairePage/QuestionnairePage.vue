<template>
    <section class="mainContener">
        <div class="shell ">
            <button @mouseenter="handleMouseEnter"
                    @mouseleave="handleMouseLeave" 
                    v-on:click="Manual" class="top">
                <p>Шаг 1 - Инструкция</p>
                <img v-bind:class="{  'text-ratate-img1': this.manual }"  :src="isHovered==false?'/image/arrow_to.svg': '/image/arrow_after.svg' " alt="" >
            </button>
            <button  @mouseenter="handleMouseEnter2"
                    @mouseleave="handleMouseLeave2" 
                    v-on:click="Questionnair" class="under">
                <div v-for="(item, index) in text" :key="index" >
                    <p v-if=" $route.name == item.name" >Шаг 2 - {{ item.title }}</p>
                </div>
                <img v-bind:class="{ 'text-ratate': questionnair }"  :src="isHovered2 == false ? '/image/arrow_to.svg' : '/image/arrow_after.svg'" alt="">
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
import { mapGetters } from 'vuex';

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
            isHovered: false,
            isHovered2:false,
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
    computed:{
         ...mapGetters([
            'Items'
        ]),
        
    },
    methods:{
         handleMouseEnter() {
            this.isHovered = true;
        },
        handleMouseLeave() {
            this.isHovered = false;
        },
         handleMouseEnter2() {
            this.isHovered2 = true;
        },
        handleMouseLeave2() {
            this.isHovered2 = false;
        },
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
                window.scrollTo({top: 0, behavior:'smooth'});
                
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
            width: 50px;
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