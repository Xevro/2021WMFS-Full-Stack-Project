<template>
  <div class="page">
    <Header/>
    <div v-if="noStudentData" class="content">
      <p>Kon de gegevens niet ophalen.</p>
    </div>
    <div v-if="loading" class="content">
      <p>Bezig met het ophalen van de gegevens.</p>
    </div>
    <div v-if="student" class="content">
      <p v-if="nothingFound">Kon geen gegevens ophalen</p>
      <div v-if="!nothingFound" class="information">
        <div v-if="loadingStudent" role="alert">laden van gegevens.</div>
        <h3 class="title-page">{{ student.firstname + ' ' + student.lastname }}</h3>
        <p>Studenten nummer: {{ student.r_number }}</p>
        <p>Email adres: {{ student.user.email }}</p>
        <p>Aantal dagen gelopen stage: {{ student.completed_days }}</p>
        <p>Stage mentor: {{  student.mentor.firstname + ' ' + student.mentor.lastname }}</p>
      </div>
      <div class="list-proposals">
        <LikedProposalsList :data="proposalLikes" title="Mijn favoriete stage voorstellen"/>
        <p v-if="noFavoritesFound">Geen voorstellen gevonden</p>
        <div v-if="loading" role="alert">laden van gegevens.</div>
      </div>
      <div class="contract">
        <MyProposal :data="contract" title="Mijn contract"/>
        <p v-if="noContractFound">Geen contract gevonden</p>
        <div v-if="loadingContract" role="alert">laden van gegevens.</div>
      </div>
      <div class="button-add-task" v-if="contract">
        <Button :href="'/students/' + studentId + '/tasks/add'">Voeg een taak toe</Button>
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
import LikedProposalsList from '@/components/UI/organisms/LikedProposalsList.vue'
import MyProposal from '@/components/UI/organisms/MyProposalItem.vue'
import { myAxios } from '@/main'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'
import Button from '@/components/UI/atoms/Button.vue'

@Options({
  components: {
    ProposalsList,
    MyProposal,
    Button,
    Footer,
    Header,
    LikedProposalsList
  },
  data () {
    return {
      studentId: this.$route.params.id,
      contract: null,
      proposalLikes: null,
      student: null,
      loadingStudent: false,
      nothingFound: false,
      noFavoritesFound: false,
      noContractFound: false,
      loading: false,
      loadingContract: false
    }
  },
  created () {
    this.fetchData()
    this.fetchStudentData()
    this.fetchContractData()
  },
  methods: {
    fetchData () {
      this.loading = true
      myAxios.get('api/students/' + this.studentId + '/likes')
        .then(response => {
          if (response.data.data.length === 0) {
            this.noFavoritesFound = true
            return null
          }
          this.proposalLikes = response.data.data
          this.noFavoritesFound = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.noFavoritesFound = true
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    },
    fetchStudentData () {
      this.loadingStudent = true
      myAxios.get('api/students/' + this.studentId)
        .then(response => {
          if (response.data.data.length === 0) {
            this.nothingFound = true
          }
          this.student = response.data.data
          this.nothingFound = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.error = true
          this.nothingFound = true
        }).finally(() => {
          this.loadingStudent = false
          return null
        })
      return null
    },
    fetchContractData () {
      this.loadingContract = true
      myAxios.get('api/students/' + this.studentId + '/contract')
        .then(response => {
          if (response.data.data.length === 0) {
            this.noContractFound = true
            return null
          }
          this.contract = response.data.data
          this.loadingContract = false
        })
        .catch(error => {
          console.log(error)
          this.error = true
          this.noContractFound = true
        }).finally(() => {
          this.loadingContract = false
          return null
        })
      return null
    }
  }
})
export default class studentDetails extends Vue {
}
</script>

<style scoped>
.button-add-task {
  margin-top: 40px;
  margin-bottom: 50px;
  float: right;
}

.page {
  min-height: 80vh;
  overflow: hidden;
  display: block;
  position: relative;
}

.list-proposals {
  text-align: center;
}

.contract {
  text-align: center;
}

.footer {
  position: relative;
  bottom: 0;
  width: 100%;
  margin-top: 3.125rem;
}

.content {
  padding-top: 120px;
  margin-left: 120px;
  margin-right: 120px;
  text-align: left;
}

@media screen and (max-width: 700px) {
  .information {
    margin-top: 40px;
    margin-left: 10px;
  }
  .content {
    marggin-top: 30px;
    margin-left: 70px;
    margin-right: 70px;
    text-align: left;
  }
}
</style>
