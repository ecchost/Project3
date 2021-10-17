<template>
  <div id="home-products">
    <b-container>
      <div class="filter">
        <b-row>
          <b-col>
            <b-button
              variant="transparent"
              class="btn-filter">
              Looking For
              <b-img src="~/assets/icons/chevron-down.svg" />
            </b-button>
          </b-col>
          <b-col>
            <b-button
              variant="transparent"
              class="btn-filter">
              Category
              <b-img src="~/assets/icons/chevron-down.svg" />
            </b-button>

          </b-col>
          <b-col>
            <b-button
              variant="transparent"
              class="btn-filter">
              Location
              <b-img src="~/assets/icons/chevron-down.svg" />
            </b-button>

          </b-col>
          <b-col>
            <b-button
              variant="transparent"
              class="btn-filter">
              Price
              <b-img src="~/assets/icons/chevron-down.svg" />
            </b-button>

          </b-col>
        </b-row>
      </div>
      <b-row cols-lg="3">
        <b-col
          v-for="product in products"
          :key="product.name"
          class="text-center p-5">
          <c-product-item :product="product" />
        </b-col>
      </b-row>
    </b-container>
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
        },
        {
          name: 'Nasgor',
          price: 12000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
        {
          name: 'Cireng',
          price: 5000,
        },
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
#home-products{
    padding: 1em 0;
    .filter{
        border-radius: 20px;
        background-color: #fff;
        max-width: 80%;
        margin: 0 auto;
        .row{
            width: 100%;
            margin: 0;
        }
        .col{
            border-left: 1px #eee solid;
            border-right: 1px #eee solid;
            padding: 2em 1em;
            &:first-child{
                border-left: none;
            }
            &:last-child{
                border-right: none;
            }
        }
        .btn{
            font-weight: 700;

        }
    }
}
</style>
