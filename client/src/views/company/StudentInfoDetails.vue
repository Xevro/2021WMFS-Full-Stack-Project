<template>
  <div class="page">
    <Header/>
    <div v-if="loading" class="content loading">
      <p>Bezig met het ophalen van de gegevens.</p>
    </div>
    <div v-if="student" class="content">
      <div class="information">
        <div v-if="loading" role="alert">laden van gegevens.</div>
        <h3 class="title-page">{{ student.firstname + ' ' + student.lastname }}</h3>
        <p>Studenten nummer: {{ student.r_number }}</p>
        <p>Email adres: {{ student.user.email }}</p>
        <p>Aantal dagen gelopen stage: {{ student.completed_days }}</p>
        <p>Stage mentor: {{ student.mentor.firstname + ' ' + student.mentor.lastname }}</p>
      </div>
      <div v-if="showTasks" class="tasks-list">
        <TasksList :data="tasks" :title="getTaskListTitle"/>
        <p v-if="noTasksFound">Geen taken gevonden</p>
      </div>
      <div class="contract">
        <MyProposal :data="contract" title="Contract"/>
        <p v-if="noContractFound">Geen contract gevonden</p>
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
import TasksList from '@/components/UI/organisms/TasksList.vue'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'
import MyProposal from '@/components/UI/organisms/MyProposalItem.vue'
import { myAxios } from '@/main'
import store from '@/store/index'

@Options({
  components: {
    ProposalsList,
    MyProposal,
    TasksList,
    LikedProposalsList,
    Footer,
    Header
  },
  computed: {
    getRole () {
      return store.getters.getAuthRole()
    },
    getTaskListTitle () {
      return 'Taken van ' + this.student.firstname + ' ' + this.student.lastname
    }
  },
  data () {
    return {
      studentId: this.$route.params.id,
      proposalLikes: null,
      student: null,
      contract: null,
      tasks: null,
      noTasksFound: false,
      nothingFound: false,
      showTasks: false,
      loading: false,
      noContractFound: false
    }
  },
  created () {
    this.fetchStudentData()
    this.fetchTasksData()
    this.fetchContractData()
  },
  methods: {
    fetchStudentData () {
      this.loading = true
      myAxios.get('api/students/' + this.studentId)
        .then(response => {
          if (response.data.data.length === 0) {
            this.nothingFound = true
          }
          this.student = response.data.data
          if (this.student.proposal.company.id === parseInt(store.getters.getCompanyId)) {
            this.showTasks = true
          }
          this.nothingFound = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.error = true
          this.noTasksFound = true
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    },
    fetchTasksData () {
      myAxios.get('api/students/' + this.studentId + '/tasks')
        .then(response => {
          if (response.data.data.length === 0) {
            this.noTasksFound = true
            return null
          }
          this.tasks = response.data.data
          this.noTasksFound = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.error = true
          this.noTasksFound = true
        })
      return null
    },
    fetchContractData () {
      myAxios.get('api/students/' + this.studentId + '/contract')
        .then(response => {
          if (response.data.data.length === 0) {
            this.noContractFound = true
            return null
          }
          this.contract = response.data.data
          this.loadingContract = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.error = true
          this.noContractFound = true
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

.tasks-list {
  text-align: center;
  margin-top: 30px;
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

.contract {
  text-align: center;
  margin-top: 30px;
  margin-left: 30px;
  margin-right: 30px;
}

@media screen and (max-width: 700px) {
  .information {
    margin-top: 40px;
    margin-left: 10px;
  }

  .loading {
    margin-top: 30px;
  }

  .content {
    padding-top: 50px;
    margin-left: 50px;
    margin-right: 50px;
    text-align: left;
  }

  .contract {
    text-align: center;
    margin-top: 30px;
    margin-right: 0;
    margin-left: 0;
  }
}
</style>
