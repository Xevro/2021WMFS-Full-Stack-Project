<template>
  <div class="page">
    <Header :type-user="'company'"/>
    <div class="lists">
      <ProposalsList :data="companies" title="Mijn actieve stage voorstellen"/>
      <p v-if="nothingFound">Geen taken gevonden</p>
      <div v-if="loading" role="alert">laden van gegevens.</div>
      <div class="button-add-proposal">
        <Button :href="'/companies/1/proposals/add'">Voeg een voorstel toe</Button>
      </div>
      <div class="my-contract">
      </div>
    </div>
  </div>
  <div class="footer">
    <Footer/>
  </div>
</template>

<script lang="ts">

import { Options, Vue } from 'vue-class-component'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'
import Footer from '@/components/UI/organisms/Footer.vue'
import Button from '@/components/UI/atoms/Button.vue'
import Header from '@/components/UI/organisms/Header.vue'
import { myAxios } from '@/main'
import store from '@/store/index'

@Options({
  components: {
    ProposalsList,
    Button,
    Footer,
    Header
  },
  data () {
    return {
      companies: null,
      companyId: store.getters.getCompanyId,
      nothingFound: false,
      loading: false,
      error: null
    }
  },
  created () {
    this.fetchData()
  },
  methods: {
    fetchData () {
      this.loading = true
      console.log(this.companyId)
      myAxios.get('api/companies/' + this.companyId + '/proposals')
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFound = true
          }
          this.companies = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    }
  }
})
export default class CompanyHome extends Vue {
}
</script>
<style scoped>
.my-contract {
  margin-top: 100px;
}

.button-add-proposal {
  margin-top: 40px;
  margin-right: 100px;
  float: right;
}

.page {
  min-height: 80vh;
  overflow: hidden;
  display: block;
  position: relative;
}

.footer {
  position: relative;
  bottom: 0;
  width: 100%;
  margin-top: 50px;
}

.lists {
  padding-top: 120px;
}
</style>
