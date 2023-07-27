
<template>
    <section>
       <img :src="item.img" alt="">
        <p>{{ item.title }}</p>
        
    </section>
</template>

<script>
export default{
    name:'itemsWho',
    props: {
        item: Object
    }
}
</script>

<style lang="scss" scoped>
section{
    
    height: 500px;
    border:1px solid black;
    display: flex;
    img{
        margin: 32px 0 24px;
    }
    p{
        font-size: 48px;
        font-weight: 400;
    }
    
}
</style>