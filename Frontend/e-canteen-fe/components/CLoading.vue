<template>
  <div id="c-loading">
    <div class="spinner-v s1" />
    <div class="spinner-h s2" />
    <div class="spinner-v s3" />
    <div class="spinner-h s4" />
    <div class="spinner-v s5" />
    <div class="spinner-h s6" />
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    #c-loading{
        position: relative;
        width: 100px;
        height: 100px;
        @for $i from 1 through 6{
            .s#{$i}{
                width: calc(100% - ($i*10%));
                height: calc(100% - ($i*10%));
                border-top: 4px $grey solid;
                border-left: 4px $grey solid;
                border-bottom: 4px $grey solid;
                top: calc(($i*10%)/2);
                left: calc(($i*10%)/2);
            }
        }
        .spinner-h{
            position: absolute;
            border-radius: 100px;
            animation: spin-h 2s linear .5s infinite;
        }
        @keyframes spin-h {
        0%{
            transform: rotateY(0deg);
        }
        50%{
            transform: rotateY(180deg);
        }
        100%{
            transform: rotateY(360deg);
        }
        }
        .spinner-v{
            position: absolute;
            border-radius: 100px;
            -webkit-animation: spin-v 1s linear .5s infinite;
        }
        @keyframes spin-v {
            0%{
                transform: rotate(0deg);
            }
            50%{
                transform: rotate(180deg);
            }
            100%{
                transform: rotate(360deg);
            }
        }
    }
</style>
