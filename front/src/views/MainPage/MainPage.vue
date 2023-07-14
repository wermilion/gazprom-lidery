<template>
    <section  class="mainContener">
        <MainBlock class="BanerBlock"></MainBlock>
        <OpprtunitiesBlock class="OpprtunitiesBlock"></OpprtunitiesBlock>
        <WhoCanTakePart class="WhoCanTakePart"></WhoCanTakePart>
        <StagesBlock class="StagesBlock"></StagesBlock>
        <NumbersBlock class="NumbersBlock"></NumbersBlock>
        <QuestionAndAnswer class="QuestionAndAnswer"></QuestionAndAnswer>
        
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
    }
   
}
</script>

<style lang="scss" scoped>
section{
    display: flex;
    flex-direction: column;
    flex:1;
}
.WhoCanTakePart{
    margin-bottom: 112px;
}
.StagesBlock{
    margin-bottom: 112px;
}
.NumbersBlock{
    margin-bottom: 112px;
}

</style>