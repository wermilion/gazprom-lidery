<template>
    <section>
        <BanerBlock class="BanerBlock"></BanerBlock>
        <OpprtunitiesBlock class="OpprtunitiesBlock"></OpprtunitiesBlock>
        <WhoCanTakePart class="WhoCanTakePart"></WhoCanTakePart>
        <StagesBlock class="StagesBlock"></StagesBlock>
        <NumbersBlock class="NumbersBlock"></NumbersBlock>
        <QuestionAndAnswer class="QuestionAndAnswer"></QuestionAndAnswer>
    </section>
</template>


<script>
import BanerBlock from '@/components/Banner/BanerBlock.vue';
import OpprtunitiesBlock from '@/components/Opportunities/OpprtunitiesBlock.vue';
import WhoCanTakePart from '@/components/WhoCanTakePart/WhoCanTakePart.vue';
import StagesBlock from '@/components/Stages/StagesBlock.vue';
import NumbersBlock from '@/components/Numbers/NumbersBlock.vue';
import QuestionAndAnswer from '@/components/QuestionAndAnswer/QuestionAndAnswer.vue';
export default{
    name:'MainPage',
    components:{
        BanerBlock,
        OpprtunitiesBlock,
        WhoCanTakePart,
        StagesBlock,
        NumbersBlock,
        QuestionAndAnswer,
    }
   
}
</script>

<style lang="scss" scoped>

.OpprtunitiesBlock{
    margin: 160px 42px 160px 40px;
}
.WhoCanTakePart{
    margin-bottom: 160px;
}
.StagesBlock{
    margin-bottom: 160px;
}
.NumbersBlock{
    margin-bottom: 160px;
}
.QuestionAndAnswer{
    margin-bottom: 64px;
}
</style>