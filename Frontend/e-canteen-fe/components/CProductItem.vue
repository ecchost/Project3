<template>
  <div id="c-product-item">
    <div class="img-container">
      <b-img src="https://picsum.photos/200" />
    </div>
    <div class="p-3">
      <h5 class="name fw-5">
        {{ product.name }}
      </h5>
      <h6 class="text-danger fw-5">
        RP. {{ product.price }}
      </h6>
      <p class="fw-2">
        {{ product.address }}
      </p>
    </div>
    <b-row class="nav">
      <b-col class="text-center">
        Wish
      </b-col>
      <b-col class="text-center">
        Cart
      </b-col>
      <b-col class="text-center">
        Buy
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  props: {
    product: Object,
  },
}
</script>

<style lang="scss" scoped>
#c-product-item{
  border-radius: 20px;
  box-shadow: 0px 32px 34px rgba(0, 0, 0, 0.133714);
  .img-container{
    padding: 0;
    max-height: 266px;
    border-radius: 20px 20px 0 0px;
    img{
      width: 100%;
      height: 100%;
      max-height: 266px;
      border-radius: inherit;
    }
  }
  .nav{
    margin: 0;
    color: #000;
    font-weight: 600;
    font-size: 14px;
    .col{
      z-index: 1;
      padding: .8em 0;
      border: 1px #ddd solid;
      border-bottom: none;
      cursor: pointer;
      &:first-child{
        border-left: none;
        border-radius: 0 0 0 20px;
      }
      &:last-child{
        border-radius: 0 0 20px 0;
        border-right: none;
      }
      &:hover{
        box-shadow: 0px 32px 34px rgba(0, 0, 0, 0.133714);
        z-index: 3;
        transition: all .5s;
      }
    }
  }
}
</style>
