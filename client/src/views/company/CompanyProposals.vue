<template>
  <div class="page">
    <Header :type-user="'company'"/>
    <div class="lists">
      <ProposalsList :data="companies" title="Al mijn stage voorstellen"/>
      <p v-if="nothingFound">Geen taken gevonden</p>
      <div v-if="loading" role="alert">laden van gegevens.</div>
    </div>
  </div>
  <div class="footer">
    <Footer/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/Header.vue'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'
import { myAxios } from '@/main'

@Options({
  components: {
    ProposalsList,
    Footer,
    Header
  },
  data () {
    return {
      companies: null,
      nothingFound: false,
      loading: false,
      companyId: this.$route.params.id,
      error: null
    }
  },
  created () {
    this.fetchData()
  },
  methods: {
    fetchData () {
      this.loading = true
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
export default class CompanyProposals extends Vue {
}
</script>

<style scoped>
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
  margin-top: 3.125rem;
}

.lists {
  padding-top: 120px;
}
</style>
