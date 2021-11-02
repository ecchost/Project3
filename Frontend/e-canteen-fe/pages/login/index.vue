<template>
  <div id="content">
    <b-container>
      <div class="header">
        <b-row class="mt-5">
          <b-col>
            <h1>Belanja Sesukamu Beli Sepuasmu</h1>
            <p>Kapan lagi bisa belanja dan beli barang sesukamu, cek promo dan diskon pada laman promo. Ketentuan Syarat Berlaku.</p>
          </b-col>
          <b-col>
            <b-img src="~/assets/images/header-splash.png" />
          </b-col>
        </b-row>
      </div>
      <div class="flex-center pb-5">
        <div class="card p-5 w-50">
          <b-form>
            <label for="username">
              ID/Username
            </label>
            <b-form-input />
            <label
              for="password"
              class="mt-3">
              Password
            </label>
            <b-form-input />
            <p class="mt-3">Dont have an account? <a
              href="#"
              class="text-grey">Register</a></p>
            <div class="text-center mt-5">
              <b-button class="btn-login">
                Login
              </b-button>
            </div>
          </b-form>
        </div>
      </div>
      <br><br><br><br>
    </b-container>
    <div class="content" />
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
#content{
  background-image: linear-gradient(#000, #0001);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  .header{
      padding-top: 4em;
      padding-bottom: 4em;
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
  .flex-center{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .btn-login{
    padding: .5em 3em;
    background-color: #FFAC12;
    border-radius: 20px;
    color: #000;
    font-weight: 700;
    border: none;
    img{
      margin-left: 1em;
    }
  }
  .w-50{
    width: 50%;
  }
}
</style>
