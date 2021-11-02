<template>
  <div id="home-products">
    <b-container>
      <div class="filter mb-5">
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
      <div
        v-for="merchant, m_id in merchants"
        :key="m_id"
        class="mt-3">
        <div class="divider my-3" />
        <h3 class="text-center">
          <b>{{ merchant.name }}</b>
        </h3>
        <h5 class="text-center m-0">
          {{ merchant.address }}
        </h5>
        <b-row cols-lg="3">
          <b-col
            v-for="product in merchant.products"
            :key="product.name"
            class="text-center p-5">
            <c-product-item :product="product" />
          </b-col>
        </b-row>
        <router-link to="#">
          <div class="text-center slide-down">
            <a
              href="javascript:"
              class="text-grey">
              <b>Show More</b> <br>
              <b-img
                src="~/assets/icons/db-chevron-down.svg" />
            </a>
          </div>
        </router-link>
      </div>
    </b-container>
  </div>
</template>

<script>

export default {
  data() {
    return {
      merchants: [
        {
          name: 'Toko Barokah',
          address: 'Jurusan Teknologi Informasi, Lt. 7 Siti',
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
        },
        {
          name: 'Toko Jenang Mbendul',
          address: 'Jurusan Akuntansi, Lt. 1 Ak',
          products: [
            {
              name: 'Mie',
              address: 'Jurusan Akuntansi, Lt. 1 Ak',
              price: 10000,
            },
            {
              name: 'Nasgor',
              address: 'Jurusan Akuntansi, Lt. 1 Ak',
              price: 12000,
            },
            {
              name: 'Cireng',
              address: 'Jurusan Akuntansi, Lt. 1 Ak',
              price: 5000,
            },
          ],
        },
        {
          name: 'Toko KuSuka',
          address: 'Jurusan Teknik Sipil, Lt. 3 Siti',
          products: [
            {
              name: 'Risoles Sosis Solo',
              address: 'Jurusan Teknik Sipil, Lt. 3 Siti',
              price: 18.000,
            },
            {
              name: 'Roti Brian Goreng',
              address: 'Jurusan Teknik Sipil, Lt. 3 Siti',
              price: 12000,
            },
            {
              name: 'Kripik Usus Gurih',
              address: 'Jurusan Teknik Sipil, Lt. 3 Siti',
              price: 5000,
            },
          ],
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
  .divider{
    height: 4px;
    width: 100%;
    background-color: $light-grey;
  }
  .slide-down{
    img{
      transform: translateY(-5px);
      transition: all .5s;
    }
    &:hover{
      img{
        transform: translateY(5px);
      }
    }
  }
}
</style>
