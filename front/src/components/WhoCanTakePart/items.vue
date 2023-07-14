
<template>
    <section>
       
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
    align-items: center;
    justify-content: center;
}
</style>