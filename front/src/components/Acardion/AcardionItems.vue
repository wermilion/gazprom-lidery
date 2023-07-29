<template>
    <section>
        <div @click="Accordion()" class="Shell">
            <button  class="head">
                <h3 >{{ item.title }}</h3>
                <div>     
                    <div :class="{ 'rotete_one': isActive }" class="one"></div>
                    <div :class="{ 'rorate': isActive }" class="two"></div>
                </div>
            </button>
            <div v-show="isActive === true">
             
            </div>
        </div>
    </section>
</template>


<script>
export default {
    name: 'AcardionItems',
    props: {
        item: Object
    },
    data(){
        return{
            isActive: false,
        }
    },
    methods:{
         Accordion() {
            this.isActive =!this.isActive
        }
    }
}
</script>

<style lang="scss" scoped>
section{
    .Shell{
        width: 100%;
        margin: 0 auto;
        background-color: #F5F5F5;
        margin-bottom:8px ;
         button:hover{
            div{
                background-color: #0079C2;
                .one,.two{
                    background-color: white;
                }
            }
        }
        button{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
            background-color: #F5F5F5;
            font-size: 32px;
            h3{
                padding-left: 40px;
                font-weight: normal;
                color: #000;
            }
            div{
                display: flex;
                align-items: center;
                position: relative;
                justify-content: center;
                background-color: white;
                border-radius: 50%;
                width: 62px;
                height: 62px;
                transition: 0.5s;
                .one,.two{
                    flex: 2;
                    background-color: #000;
                    position: absolute;
                    width: 37px;
                    height: 3px;
                    border-radius: 0;
                    
                }
                .one{
                    transform:  rotate(90deg);
                }
                .rotete_one{
                    transform:  rotate(135deg);
                }
                .rorate{
                    transform:  rotate(45deg);
                }
            }
        }
    }
}

</style>