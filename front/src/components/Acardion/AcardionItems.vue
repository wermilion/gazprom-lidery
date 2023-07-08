<template>
    <section>
        <div class="Shell">
            <div class="head">
                <h3 >{{ item.title }}</h3>
                <button @click="Accordion()">
                    <img v-bind:style="{ transform: isActive ? 'rotate(135deg)' : 'rotate(90deg)' }"  class="img1"  src="/image/Line 5.png" alt="">
                    <img v-bind:style="{ transform: isActive ? 'rotate(45deg)' : 'rotate(0deg)' }"  class="img2" src="/image/Line 5.png" alt="">
                </button>
            </div>
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
        .head{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            h3{
                padding-left: 40px;
            }
            button{
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: white;
                border-radius: 50%;
                width: 62px;
                height: 62px;
                margin:28px 42px 28px;
                
                .img1{
                    transition-duration: .2s;
                    position: absolute;
                    transform: rotate(90deg);

                }
                .img2{
                     transition-duration: .2s;
                }
                
                
            }
            
        }
        p{
            
            padding: 40px ;
        }

    }
}

</style>