<template>
    <section>
        <section class="chell">
            <div class="inside">
                <p>Здесь будет инструкция</p>
            </div>
            <div class="botton">
                <button v-on:click="$emit('instruction')">Готово</button>
            </div>
        </section>
    </section>
</template>



<script>
export default {
    name: 'InstructionModel',

}
</script>

<style lang="scss" scoped>
section {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(244, 244, 244, 0.10);
    backdrop-filter: blur(7.5px);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;

    .chell {
        width: 1840px;
        max-width: 100%;
        height: 903px;
        box-shadow: 10px 10px 40px 0px rgba(51, 148, 206, 0.70);

        .inside {
            border: 1px solid #000;
            width: 1530px;
            max-width: 100%;
            height: 679px;
            padding: 24px;
        }
        .botton{
            display: flex;
            justify-content: flex-end;
            margin-top: 32px;
            width: 1530px;
            max-width: 100%;
        }
        
    }
}
