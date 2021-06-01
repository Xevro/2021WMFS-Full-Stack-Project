<template>
  <div class="page">
    <Header :type-user="'student'"/> <!-- wijzig dit met het storage atribuut -->
    <div class="content">
      <div class="information">
        <div v-if="loadingStudent" role="alert">laden van gegevens.</div>
        <h3 class="title-page">{{ student.firstname + ' ' + student.lastname }}</h3>
        <p>Studenten nummer: {{ student.r_number }}</p>
        <p>Email adres: {{ student.user.email }}</p>
        <p>Aantal dagen gelopen stage: {{ student.completed_days }}</p>
        <p>Stage mentor: {{  student.mentor.firstname + ' ' + student.mentor.lastname }}</p>
      </div>
      <div class="lists">
          <LikedProposalsList :data="proposalLikes" title="Mijn leuk gevonden stage voorstellen"/>
          <p v-if="nothingFound">Geen taken gevonden</p>
          <div v-if="loading" role="alert">laden van gegevens.</div>
          
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

@Options({
  components: {
    Footer,
    Header,
    LikedProposalsList
  },
  data () {
    return {
      studentId: this.$route.params.id,
      proposalLikes: null,
      student: null,
      loadingStudent: false,
      nothingFound: false,
      loading: false
    }
  },
  created () {
    this.fetchData()
    this.fetchStudentData()
  },
  methods: {
    fetchData () {
      this.loading = true
      myAxios.get('api/students/' + this.studentId + '/likes')
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFound = true
          }
          this.proposalLikes = response.data.data
          this.nothingFound = false
        })
        .catch(error => {
          console.log(error)
          this.error = true
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
          if (!response.data.data.length) {
            this.nothingFound = true
          }
          this.student = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.error = true
        }).finally(() => {
          this.loadingStudent = false
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
.page {
  min-height: 80vh;
  overflow: hidden;
  display: block;
  position: relative;
}

.lists {
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
