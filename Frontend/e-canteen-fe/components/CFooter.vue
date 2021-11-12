<template>
  <div id="c-footer">
    <b-container>
      <div class="head">
        <h1>Make your dreams a <span>reality</span></h1>
        <b-button class="btn-register">
          Register
          <b-img src="~/assets/icons/arrow-right-white.svg" />
        </b-button>
      </div>
      <hr>
      <b-row class="footer-body">
        <b-col>
          <div class="logo">
            <a href="/">
              <b-img src="~/assets/icons/real-estate.svg" />
            </a>
          </div>
          <div class="social">
            <a href="#c-footer">
              <b-img src="~/assets/icons/facebook.svg" />
            </a>
            <a href="#c-footer">
              <b-img src="~/assets/icons/twitter.svg" />
            </a>
            <a href="#c-footer">
              <b-img src="~/assets/icons/instagram.svg" />
            </a>
          </div>
        </b-col>
        <b-col class="links">
          <p class="head">
            Heading
          </p>
          <ul class="list">
            <li>link</li>
            <li>link</li>
            <li>link</li>
            <li>link</li>
          </ul>
        </b-col>
        <b-col class="links">
          <p class="head">
            Heading
          </p>
          <ul class="list">
            <li>link</li>
            <li>link</li>
            <li>link</li>
            <li>link</li>
          </ul>
        </b-col>
        <b-col class="links">
          <p class="head">
            Heading
          </p>
          <ul class="list">
            <li>link</li>
            <li>link</li>
            <li>link</li>
            <li>link</li>
          </ul>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
    #c-footer{
        padding: 4em 0;
        background-image: linear-gradient(-135deg, yellow -100%, #0000 30%), linear-gradient(#000, #000);
        color: #fff;
        .head{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3em;
            h1{
                display: inline-block;
            }
              .btn-register{
                padding: 1em 3em;
                background-color: #FFAC12;
                border-radius: 0 20px 0 0;
                color: #000;
                font-weight: 700;
                border: none;
                margin-left: 1em;
                img{
                    margin-left: 1em;
                }
            }
        }
        hr{
            background-color: #333;
        }
        .footer-body{
            margin-top: 3em;
            .social{
                margin-top: 2em;
                img{
                    margin-right: 2em;
                }
            }
            .links{
                .head{
                    font-size: 18px;
                    font-weight: 500;
                }
                .list{
                    list-style: none;
                    padding: 0;
                    color: #ddd;
                }
            }
        }
    }
</style>
