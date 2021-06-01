<template>
  <div class="page">
    <Header :type-user="'student'"/> <!-- wijzig dit met het storage atribuut -->
    <div class="content">
      <div class="add-to-favorites">
        <p>Voeg toe aan favorieten</p>
      </div>
      <div class="content-info-box">
        <h3 class="title-page">Stage voorstel #{{ details.id }}</h3>
        <p>De stage loop van {{ details.start_period }} tot {{ details.end_period }}.</p>
        <p>Bedrijf: {{ details.company.name }}</p>
        <p>Email adres bedrijf: {{ details.company.user.email }}</p>
      <div class="information-box">
      <p class="title">Stage beschrijving</p>
        <p>{{ details.description }}</p>
        </div>
      </div>
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
import { myAxios } from '@/main'

@Options({
  name: 'ProposalDetails',
  components: {
    Footer,
    Header
  },
  data () {
    return {
      details: null,
      companyId: this.$route.params.compId,
      proposalId: this.$route.params.id,
      loading: false,
      error: null
    }
  },
  created () {
    this.fetchData()
  },
  methods: {
    fetchData () {
      // this.error = this.post = null
      this.loading = true
      myAxios.get('api/companies/' + this.companyId + '/proposals/' + this.proposalId)
        .then(response => {
          this.details = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.error = true
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    }
  }
})
export default class ProposalDetails extends Vue {
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

.title {
  font-size: 1.2rem;
  font-weight: bold;
}

.title-page {
  font-size: 1.5rem;
  font-weight: bold;
}

.information-box {
 width: 50%;
}

.add-to-favorites {
  width: 200px;
  float: right;
}

.content {
  padding-top: 120px;
  margin-left: 120px;
  margin-right: 120px;
  text-align: left;
}

@media screen and (max-width: 700px) {
  .information-box {
    width: 100%;
  }
  .add-to-favorites {
    float: left;
  }
  .content-info-box {
    padding-top: 3.125rem;
  }
}
</style>
