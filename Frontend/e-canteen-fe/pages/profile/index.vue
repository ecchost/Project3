<template>
  <div id="profile">
    <div class="header">
      <b-container>
        <b-row class="py-3">
          <b-col>
            <h2>{{ profile.name }}</h2>
            <h5 class="text-grey">
              {{ profile.id }}
            </h5>
          </b-col>
          <b-col class="flex-end">
            <h2>Rp. {{ profile.balance }}</h2>
            <h5 class="text-grey">
              Saldo
            </h5>
          </b-col>
        </b-row>
      </b-container>
    </div>
    <div class="content">
      <b-container>
        <b-row>
          <b-col>
            <div class="custom-card">
              <div class="bg-light-grey p-3 radius-20">
                <b-row>
                  <b-col
                    cols="auto"
                    class="flex-vertical-center">
                    <b-avatar />
                  </b-col>
                  <b-col class="text-vertical-center">
                    <p class="m-0">
                      {{ profile.name }}
                    </p>
                    <p class="text-primary-1 m-0">
                      View Profile
                    </p>
                  </b-col>
                </b-row>
              </div>
              <div class="mt-4">
                <div
                  v-for="p, id in Object.entries(profile).filter((val)=>val[0]!=='balance' && val[0]!=='id'&& val[0]!=='name')"
                  :key="id"
                  class="border-1-lightgrey py-3 px-4 mb-2 radius-8">
                  {{ p[1] }}
                </div>
              </div>
              <div class="text-right mt-5">
                <b-button
                  variant="dark"
                  class="radius-20 px-3">
                  Update <b-img src="~/assets/icons/arrow-right-yellow.svg" />
                </b-button>
              </div>
            </div>
          </b-col>
          <b-col
            cols="auto"
            style="max-width:30%;">
            <div class="custom-card">
              <div class="text-center">
                <b>Saldo</b>
              </div>
              <div class="border-1-lightgrey py-3 px-4 mt-3 radius-8 ">
                Rp. {{ profile.balance }}
              </div>
              <div class="text-center mt-3">
                <b>Top Up</b>
              </div>
              <b-row
                cols="2"
                class="mt-3">
                <b-col
                  v-for="item, id in topup"
                  :key="id"
                  class="mb-2">
                  <b-button
                    variant="transparent"
                    class="border-1-lightgrey radius-8 text-center"
                    block
                    @click="changeTopup(item)">
                    {{ item }}
                  </b-button>
                </b-col>
              </b-row>
              <div class="border-1-lightgrey py-3 px-4 mt-3 radius-8 text-center">
                Rp. {{ topupValue || ' _ _ _ _ _ _ _ _' }}
              </div>
              <div class="text-center mt-4">
                <b-button
                  variant="dark"
                  class="radius-20 px-3"
                  @click="onTopup">
                  Top Up <b-img src="~/assets/icons/plus-yellow.svg" />
                </b-button>
              </div>
            </div>
          </b-col>
        </b-row>
        <div class="custom-card p-3 mt-5">
          <div class="p-3">
            <b>History Transaction</b>
          </div>
          <div>
            <b-table
              :items="history"
              :fields="fields"
              show-empty
              :per-page="perPage"
              :current-page="currentPage"
              empty-text="You have no transaction yet"
              empty-html="You have no history yet">
              <template #empty="scope">
                <div class="text-center">
                  {{ scope.emptyText }}
                </div>
              </template>
              <template #emptyfiltered="scope">
                <h4>{{ scope.emptyFilteredText }}</h4>
              </template>
              <template #cell(price)="data">
                Rp. {{ data.value }}
              </template>
            </b-table>
            <b-pagination
              v-model="currentPage"
              align="center"
              :per-page="perPage"
              pills
              :total-rows="rows" />
          </div>
        </div>
      </b-container>
    </div>
  </div>
</template>

<script>
import { mapMutations } from 'vuex'

export default {
  data() {
    return {
      profile: {
        name: 'Panji Situmorang',
        id: '882826327397392',
        balance: 250000,
        uname: 'panji_situmorang',
        telp: '+618273827493',
        email: 'panji@mail.com',
      },
      topup: [
        10000, 20000, 50000, 100000, 150000,
      ],
      topupValue: 0,
      fields: [
        'id', 'transaction', 'quantity', 'price', 'status',
      ],
      perPage: 5,
      currentPage: 1,
      history: [
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
        {
          id: 'asd', transaction: 'Top Up', quantity: '1', price: 16000, status: 'wait for verification',
        },
      ],
    }
  },
  computed: {
    rows() {
      return this.history.length
    },
  },
  methods: {
    ...mapMutations(['setTopup']),
    changeTopup(topup) {
      this.topupValue = topup
    },
    onTopup() {
      this.setTopup(this.topupValue)
      this.$router.push('/topup')
    },
  },
}
</script>

<style lang="scss" scoped>
#profile{
    .header{
        padding-top: 6em;
        background-color: #000;
        color: #fff;
    }
    .content{
        padding: 4em 0;
        .custom-card{
            padding: 2em;
            background-color: #fff;
            border-radius: 20px;
            height: 100%;
            box-shadow: 0px 32px 34px rgba(0, 0, 0, 0.133714);
        }
    }
}
.flex-end{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: center;
}
.flex-vertical-center{
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.border-1-lightgrey{
    border: 1px $light-grey solid;
}
.radius-8{
    border-radius: 8px;
}
.radius-20{
    border-radius: 20px;
}
</style>
