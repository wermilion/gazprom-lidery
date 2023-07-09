<template>
    <section class="mainContener">
        <div class="shell ">
            <div class="top">
                <p>Шаг 1 - Инструкция</p>
                <button v-on:click="Manual"><img v-bind:class="{ 'text-ratate-img1': this.manual }"
                        src="/image/Vector 1.png" alt=""></button>
            </div>
            <div class="under">
                <p>Шаг 2 - Управленческие решения</p>
                <button v-on:click="Questionnair"><img v-bind:class="{ 'text-ratate': questionnair }"
                        src="/image/Vector 1.png" alt=""></button>
            </div>
        </div>
        <div class="Tab">
            <ManualBlock @Checkbox1="Checkbox1" :checkbox="checkbox"  @Questionnair="Questionnair" v-show="manual"></ManualBlock>
            <ManagementBlock v-show="questionnair"></ManagementBlock>
        </div>
    </section>
</template>


<script>
import ManagementBlock from '@/components/ManagementBlock/ManagementBlock.vue';
import ManualBlock from '@/components/Manual/ManualBlock.vue';
export default {
    name: 'ManagementPage',
    components: {
        ManagementBlock,
        ManualBlock
    },
    data() {
        return {
            manual: true,
            questionnair: false,
            checkbox: false,

        }
    },

    methods: {
        Manual() {
            this.manual = !this.manual
            if (this.checkbox) {
                this.questionnair = !this.questionnair

            }
        },
        Ratate() {
            this.rotate = !this.rotate
        },
        Questionnair() {
            if (this.checkbox) {
                this.questionnair = !this.questionnair
                this.manual = !this.manual


            }
        },
        Checkbox1() {
            this.checkbox = !this.checkbox

        }

    }
}
</script>

<style lang="scss" scoped>
.Tab{
        margin-bottom: 56px;
}
section{
    .shell{
        
        margin: 32px 0;
        display: flex;
        p{
            font-size: 64px;
            font-weight:bold ;
            
            font-weight: 700px;
            font-size: 64px;
            color: #064677;
            margin-right: 24px;
        }   
        img{
             
            padding-bottom: -20px;
            margin-right: 34px;
            
        }
    
        .top,.under{
            display: flex;
            border: 3px solid #064677;
            justify-content: space-between;
            align-items: center;
            padding: 32px 12px ;
            .text-ratate-img1{
                transform: rotate(180deg);
            }
            .text-ratate{
                transform: rotate(180deg);
            }

        }
        .top{
           margin-right: 115px;
           display: flex;
           align-items: center;
            justify-content: center;
            button{
                background-color:white;
                width: 96px;
               
            }
        }
        .under{
            display: flex;
            align-items: center;
            justify-content: center;
            
            button{
                background-color:white;
                width: 96px;
                
            }
        }
    
    }
}
</style>