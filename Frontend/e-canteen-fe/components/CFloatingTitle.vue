<template>
  <div id="c-floating-title">
    <h1 class="text-center">
      {{ title }}
    </h1>
    <div class="gradient-line" />
  </div>
</template>

<script>
export default {
  props: {
    title: String,
  },
}
</script>

<style lang="scss" scoped>
#c-floating-title{
    box-shadow: 0px 32px 34px rgba(0, 0, 0, 0.133714);
    max-width: 720px;
    transform: translate(0, -50%);
    background-color: white;
    border-radius: 20px;
    padding: 1.5em 0;
    margin: 0 auto;
    .gradient-line{
        width: 50%;
        height: 3px;
        background: linear-gradient(90deg,yellow, black);
        margin: 0 auto;
    }
}
</style>
