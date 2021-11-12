<template>
  <div id="topup">
    <div class="header">
      <b-container>
        <h2 class="py-3 mb-0">
          Top Up
        </h2>
      </b-container>
    </div>
    <div class="content">
      <b-container>
        <div class="custom-card p-4">
          <b-row>
            <b-col class="flex-vertical-center">
              <p class="m-0 fs-3">
                <b>Total Billing</b>
              </p>
              <p class="text-danger m-0 fs-3">
                <b>{{ topup }}</b>
              </p>
            </b-col>
            <b-col
              cols="auto"
              class="flex-vertical-center">
              <a href="javascript:">DETAIL</a>
            </b-col>
          </b-row>
        </div>
        <div class="custom-card mt-5">
          <div class="flex-between pt-4 px-4">
            <div>
              <b-select

                v-model="selectedBank"
                :options="banks" />
            </div>
            <b-img src="~/assets/images/bni.png" />
          </div>
          <hr>
          <div class="p-4">
            <ul>
              <li
                v-for="item, id in desc[selectedBank]"
                :key="id">
                <b>{{ item }}</b>
              </li>
            </ul>
          </div>
        </div>
        <div class="custom-card p-4 mt-5">
          <dropzone
            id="custom-dropzone"
            ref="dz"
            :options="options"
            :destroy-dropzone="true"
            :use-custom-slot="true"
            @vdropzone-file-added="getFile">
            <div class="flex-center">
              <b-img src="~/assets/icons/upload.png" />
              <p class="text-grey fs-5 m-0">
                <b> Upload Transfer Proof</b>
              </p>
            </div>
          </dropzone>
        </div>
      </b-container>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Dropzone from 'nuxt-dropzone'
import 'nuxt-dropzone/dropzone.css'

export default {
  components: {
    Dropzone,
  },
  data() {
    return {
      banks: [
        { value: 0, text: 'BNI' },
        { value: 1, text: 'BRI' },
        { value: 2, text: 'Mandiri' },
      ],
      desc: [
        ['This Transaction is manual verified by Admin of this Store or System',
          'BNI - 0738139144 - AN. Arga Diaz Prawira',
          'Upload proof of transfer after making payment'],
        ['This Transaction is manual verified by Admin of this Store or System',
          'BRI - 0738139144 - AN. Arga Diaz Prawira',
          'Upload proof of transfer after making payment'],
        ['This Transaction is manual verified by Admin of this Store or System',
          'MANDIRI - 0738139144 - AN. Arga Diaz Prawira',
          'Upload proof of transfer after making payment'],
      ],
      selectedBank: 0,
      options: {
        url: 'http://httpbin.org/anything',
        addRemoveLinks: true,
        maxFileSize: 3084,
        maxFiles: 1,
      },
    }
  },
  computed: {
    ...mapState(['topup']),
  },
  created() {
    if (this.$store.state.topup === 0) {
      this.$router.push('/profile')
    }
  },
  methods: {
    getFile(file) {
      console.log(file)
      this.$bvToast.toast('Your file have been sent', {
        title: 'Notice',
        autoHideDelay: 3000,
      })
    },
  },
}
</script>

<style lang="scss" scoped>
#topup{
    .header{
        padding-top: 6em;
        background-color: #000;
        color: #fff;
    }
    .content{
        padding: 4em 0;
        .custom-card{
            background-color: #fff;
            border-radius: 20px;
            height: 100%;
            box-shadow: 0px 32px 34px rgba(0, 0, 0, 0.133714);
        }
    }
}
.flex-vertical-center{
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: .5em;
}
.flex-between{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.flex-center{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: .5em;
}
.radius-20{
    border-radius: 20px;
}
</style>
<style lang="scss" scoped>
  #custom-dropzone {
    font-family: 'Arial', sans-serif;
    transition: background-color .2s linear;
    &.dz-clickable{
        border-radius: 20px;
    }
  }
</style>
