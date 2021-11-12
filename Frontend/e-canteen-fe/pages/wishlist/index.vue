<template>
  <div id="wishlist">
    <div class="header">
      <b-container>
        <b-row>
          <b-col>
            <p class="fs-3 fw-4">
              My Wishlist
            </p>
            <p class="fs-1 text-grey">
              List Product from my wishlist
            </p>
          </b-col>
          <b-col class="flex-end">
            <div class="label bg-primary-1 flex-vertical-center p-3">
              Wishlist: {{ products.length }}
            </div>
          </b-col>
        </b-row>
      </b-container>
    </div>
    <div class="content py-5">
      <b-container>
        <b-row cols-lg="3">
          <b-col
            v-for="product in products"
            :key="product.name"
            class="text-center p-5">
            <c-product-item
              :product="product"
              no-wish />
          </b-col>
        </b-row>
      </b-container>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [
        {
          name: 'Mie',
          price: 10000,
          address: 'Jurusan Teknologi Informasi, Lt. 7 Siti',
        },
        {
          name: 'Nasgor',
          price: 12000,
          address: 'Jurusan Teknologi Informasi, Lt. 7 Siti',
        },
        {
          name: 'Cireng',
          price: 5000,
          address: 'Jurusan Teknologi Informasi, Lt. 7 Siti',
        },
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
#wishlist{
    .header{
        padding-top: 6em;
        background-color: #000;
        color: #fff;
    }
    .label{
        height: fit-content;
        border-radius: 10px;
        color: #000;
        font-weight: 600;
    }
}
.flex-end{
    display: flex;
    justify-content: flex-end;
}
.flex-vertical-center{
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
