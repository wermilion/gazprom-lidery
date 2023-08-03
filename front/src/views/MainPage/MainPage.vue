<template>
    <section  class="mainContener">
        <MainBlock class="BanerBlock"></MainBlock>
        <OpprtunitiesBlock class="OpprtunitiesBlock"></OpprtunitiesBlock>
        <WhoCanTakePart class="WhoCanTakePart"></WhoCanTakePart>
        <StagesBlock class="StagesBlock"></StagesBlock>
        <NumbersBlock class="NumbersBlock"></NumbersBlock>
        <QuestionAndAnswer class="QuestionAndAnswer"></QuestionAndAnswer>
          <button class="scroll-to-top" @click="scrollToTop" v-if="showButton">
            <img src="/image/up.svg" alt="">
        </button>
    </section>
    
</template>


<script>
import MainBlock from '@/components/MainElement/MainBlock.vue';
import OpprtunitiesBlock from '@/components/Opportunities/OpprtunitiesBlock.vue';
import WhoCanTakePart from '@/components/WhoCanTakePart/WhoCanTakePart.vue';
import StagesBlock from '@/components/Stages/StagesBlock.vue';
import NumbersBlock from '@/components/Numbers/NumbersBlock.vue';
import QuestionAndAnswer from '@/components/QuestionAndAnswer/QuestionAndAnswer.vue';
export default{
    name:'MainPage',
    components:{
        MainBlock,
        OpprtunitiesBlock,
        WhoCanTakePart,
        StagesBlock,
        NumbersBlock,
        QuestionAndAnswer,
    },
    data() {
        return {
            showButton: false
        };
    },
    methods: {
        handleScroll() {
            this.showButton = window.scrollY > 100;
        },
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    },
    mounted() {
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    }
   
}
</script>

<style lang="scss" scoped>
.scroll-to-top {
  position: fixed;
  bottom: 50px;
  right: 89px;
  background:none;
  border: none;
  display: flex;
  align-items: center;
}
section{
    display: flex;
    flex-direction: column;
    flex:1;
}

.StagesBlock{
    margin-bottom: 56px;
}
.NumbersBlock{
    margin-bottom: 56px;
}

</style>