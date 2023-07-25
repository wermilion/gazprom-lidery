<template>
    <section>
        <div @click="Accordion()" class="Shell">
            <button  class="head">
                <p >{{ item.title }}</p>
                <div>
                    <!-- <span class="one"></span>
                    <span class="two"></span> -->
                    
                    
                    <img  v-bind:style="{ transform: isActive ? 'rotate(45deg)' : 'rotate(0deg)' }"  class="img2" src="/image/Frame 3.svg" alt="">
                </div>
            </button>
            <div class="inside" v-show="isActive === true">
                <p v-if="item.p">{{ item.p }}</p>
                <ul>
                    <li v-if="item.li1">{{ item.li1 }}</li>
                    <li v-if="item.li2">{{ item.li2 }}<router-link class="router-link" to="" v-if="item.router">{{ item.router }}</router-link></li>
                    <li v-if="item.li3">{{ item.li3 }}</li>
                    <li v-if="item.li4">{{ item.li4 }}</li>
                </ul>
            </div>
        </div>
    </section>
</template>


<script>
export default {
    name: 'AcardionItemsQuestion',
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
            p{
                padding-left: 16px;
                font-family: HeliosCond;
                font-size: 32px;
                font-weight: 400;
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
                
                span{
                    flex: 2;
                    background-color: #000;
                }
                .rorate{
                    transform:  rotate(45deg);
                }
            }
        }
        .inside{
            padding: 0  80px 40px 40px;
            p{
                margin: 0;
                padding: 0;
                font-size: 32px;
                font-weight: 400;
            }
            li{
                margin-left:40px ;
                font-size: 32px;
                font-weight: 400;
                text-align: justify;
                .router-link{
                    margin-left: 5px;
                }
            }
        }
        
        
    }
}

</style>