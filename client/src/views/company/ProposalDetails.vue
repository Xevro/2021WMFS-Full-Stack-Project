<template>
  <div class="page">
    <Header/>
    <div v-if="error" class="content">
      <p>{{ error }}</p>
    </div>
    <div v-if="loading" class="content">
      <p>Bezig met het ophalen van de gegevens.</p>
    </div>
    <div v-if="details" class="content">
      <div v-if="role === 'student'" class="add-to-favorites">
        <form novalidate @submit.prevent="addToFavorites">
          <Button :disabled="disableButton" :type="'submit'"> {{ favorietenTekst }}</Button>
        </form>
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
import Button from '@/components/UI/atoms/Button.vue'
import { myAxios } from '@/main'
import store from '@/store/index'

@Options({
  name: 'ProposalDetails',
  components: {
    Button,
    Footer,
    Header
  },
  computed: {
    role () {
      return store.getters.getAuthRole
    },
    getStudentId () {
      return store.getters.getStudentId
    }
  },
  data () {
    return {
      details: null,
      disableButton: false,
      favorietenTekst: null,
      companyId: this.$route.params.compId,
      proposalId: this.$route.params.id,
      loading: false,
      error: null
    }
  },
  created () {
    this.fetchData()
    if (this.role === 'student') {
      this.favoritesStatus()
    }
  },
  methods: {
    favoritesStatus () {
      myAxios.get('api/students/' + this.getStudentId + '/likes/' + this.proposalId).then(async (response) => {
        if (response.data.data.length === 0) {
          this.favorietenTekst = 'Voeg toe aan favorieten'
          return null
        } else {
          this.favorietenTekst = 'Verwijder uit favorieten'
          return null
        }
      })
    },
    fetchData () {
      this.loading = true
      myAxios.get('api/companies/' + this.companyId + '/proposals/' + this.proposalId)
        .then(response => {
          if (response.data.data.length === 0) {
            this.error = 'Kon geen gegevens ophalen.'
            return null
          }
          this.details = response.data.data
          this.loading = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.error = 'Kon geen gegevens ophalen.'
          return null
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    },
    addToFavorites () {
      this.disableButton = true
      try {
        this.favorietenTekst = 'Even geduld.'
        myAxios.get('api/students/' + this.getStudentId + '/likes/' + this.proposalId).then(async (response) => {
          if (response.data.data.length === 0) {
            await myAxios.post('api/students/' + this.getStudentId + '/likes', {
              student_id: this.studentId,
              proposal_id: this.proposalId
            }).then(() => {
              this.$router.push({ name: 'StudentHome' })
            })
          } else {
            await myAxios.delete('api/students/' + this.getStudentId + '/likes/' + this.proposalId).then((response) => {
              if (response.data.message === 'The like has been deleted') {
                this.$router.push({ name: 'StudentHome' })
              }
            })
            return null
          }
        })
      } catch (e) {
        this.disableButton = false
        if (e.response.status === 422) {
          this.error = 'Er is een onverwachte fout opgetreden.'
          return null
        }
        this.error = 'Er is een onverwachte fout opgetreden.'
        return null
      }
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
 width: 70%;
}

.add-to-favorites {
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
    margin-top: 30px;
    float: left;
  }
  .content-info-box {
    margin-top: 100px;
  }
  .content {
    padding-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    text-align: left;
  }
}
</style>
