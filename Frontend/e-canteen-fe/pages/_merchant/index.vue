<template>
  <div id="merchant">
    <div class="header">
      <b-container>
        <b-row class="py-3">
          <b-col>
            <p class="fs-3 fw-4 m-0">
              {{ merchants[$route.params.merchant].name }}
            </p>
            <p class="fs-1 text-grey">
              {{ merchants[$route.params.merchant].address }}
            </p>
          </b-col>
          <b-col class="flex-end">
            <div class="label bg-primary-1 flex-vertical-center p-3">
              Total Product: {{ merchants[$route.params.merchant].products.length }}
            </div>
          </b-col>
        </b-row>
      </b-container>
    </div>
    <div class="content py-5">
      <b-container>
        <b-row cols-lg="3">
          <b-col
            v-for="product in merchants[$route.params.merchant].products"
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
              name: 'Kuping Gajah Kriuk',
              address: 'Jurusan Akuntansi, Lt. 1 Ak',
              price: 10000,
            },
            {
              name: 'Risoles Mayo Legit',
              address: 'Jurusan Akuntansi, Lt. 1 Ak',
              price: 12000,
            },
            {
              name: 'Kripik Usus Gurih',
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
#merchant{
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
