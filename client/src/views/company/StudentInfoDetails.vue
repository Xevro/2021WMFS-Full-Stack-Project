<template>
  <div class="page">
    <Header :type-user="'student'"/> <!-- wijzig dit met het storage atribuut -->
    <div class="content">
      <div class="information">
        <div v-if="loading" role="alert">laden van gegevens.</div>
        <h3 class="title-page">{{ student.firstname + ' ' + student.lastname }}</h3>
        <p>Studenten nummer: {{ student.r_number }}</p>
        <p>Email adres: {{ student.user.email }}</p>
        <p>Aantal dagen gelopen stage: {{ student.completed_days }}</p>
        <p>Stage mentor: {{  student.mentor.firstname + ' ' + student.mentor.lastname }}</p>
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
import { myAxios } from '@/main'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'

@Options({
  components: {
    ProposalsList,
    Footer,
    Header,
    LikedProposalsList
  },
  data () {
    return {
      studentId: this.$route.params.id,
      proposalLikes: null,
      student: null,
      nothingFound: false,
      loading: false
    }
  },
  created () {
    this.fetchStudentData()
  },
  methods: {
    fetchStudentData () {
      this.loading = true
      myAxios.get('api/students/' + this.studentId)
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFound = true
          }
          this.student = response.data.data
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
export default class StudentInfoDetails extends Vue {
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

.content {
  padding-top: 120px;
  margin-left: 120px;
  margin-right: 120px;
  text-align: left;
}

.information {
  margin-left: 30px;
}

@media screen and (max-width: 700px) {
  .information {
    margin-top: 40px;
    margin-left: 10px;
  }
  .content {
    padding-top: 50px;
    margin-left: 50px;
    margin-right: 50px;
    text-align: left;
  }
}
</style>
