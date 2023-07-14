<template>
    <section>
        <div @click="Accordion()" class="Shell">
            <button  class="head">
                <h3 >{{ item.title }}</h3>
                <div>
                    <!-- <span class="one"></span>
                    <span class="two"></span> -->
                    
                    <img v-bind:style="{ transform: isActive ? 'rotate(135deg)' : 'rotate(90deg)' }"  class="img1"  src="/image/Line 5.png" alt="">
                    <img v-bind:style="{ transform: isActive ? 'rotate(45deg)' : 'rotate(0deg)' }"  class="img2" src="/image/Line 5.png" alt="">
                </div>
            </button>
            <p v-show="isActive === true">{{ item.text }}</p>
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
                img{
                    position: absolute;
                    display: flex;
                    align-items: center;
                    justify-content: center;

                }
                span{
                    flex: 2;
                    background-color: #000;
                }
                .rorate{
                    transform:  rotate(45deg);
                }
            }
        }
        button:hover{
           
            
        }
        p{    
            padding: 40px ;
        }
        
    }
}

</style>