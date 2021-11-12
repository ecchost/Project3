<template>
  <div id="home-header">
    <b-container>
      <h1>Belanja Sesukamu Beli Sepuasmu</h1>
      <p>Kapan lagi bisa belanja dan beli barang sesukamu, cek promo dan diskon pada laman promo. Ketentuan Syarat Berlaku.</p>
    </b-container>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
#home-header{
    padding-top: 4em;
    padding-bottom: 10em;
    background-image: linear-gradient(#0001, #000), url('~/assets/images/bg-header.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    color: white;
    h1{
        margin-top: 1em;
        max-width: 350px;
        font-weight: 700;
        font-size: 3rem;
    }
    p{
        max-width: 280px;
    }
}
</style>
