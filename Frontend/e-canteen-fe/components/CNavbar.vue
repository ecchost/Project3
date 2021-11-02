<template>
  <div id="c-navbar">
    <b-navbar
      toggleable="lg"
      type="dark">
      <b-container>
        <b-navbar-brand href="/">
          <b-img src="~/assets/images/logo.png" />
          E-CANTEEN POLINEMA
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse" />

        <b-collapse
          id="nav-collapse"
          is-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav>
            <b-nav-item>Home</b-nav-item>
            <b-nav-item>Promo</b-nav-item>
            <b-nav-item>Merchant</b-nav-item>
            <b-nav-item>About</b-nav-item>
            <b-nav-item>
              <b-button class="btn-register">
                Register
                <b-img src="~/assets/icons/arrow-right-white.svg" />
              </b-button>
            </b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </b-container>
    </b-navbar>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
#c-navbar{
  padding: .5em 0;
  position: absolute;
  width: 100%;
  .navbar-nav{
    width: 100%;
    .nav-item{
      margin: 0 auto;
      display: flex;
      align-items: center;
    }
    .nav-link{
      color: #fff;
    }
  }
  .btn-register{
    padding: .5em 3em;
    background-color: #FFAC12;
    border-radius: 0 20px 0 0;
    color: #000;
    font-weight: 700;
    border: none;
    img{
      margin-left: 1em;
    }
  }
  .navbar-collapse{
    transition: all .5s;
    &.show{
      background-color: #0009;
    }
  }
  .navbar-toggler{
    border: none;
  }
}

</style>
