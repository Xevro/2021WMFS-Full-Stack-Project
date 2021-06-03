<template>
  <div class="page">
    <Header/>
    <div class="lists">
      <ProposalsList :data="companies" title="Mijn actieve stage voorstellen"/>
      <p v-if="nothingFound">Geen gegevens gevonden</p>
      <div v-if="loading" role="alert">laden van gegevens.</div>
      <div class="button-add-proposal">
        <Button :href="'/companies/' + companyId + '/proposals/add'">Voeg een voorstel toe</Button>
      </div>
      <div class="my-students">
        <StudentsList :data="students" title="Studenten overzicht"/>
        <p v-if="nothingFoundStudents">Geen gegevens gevonden</p>
        <div v-if="loadingStudents" role="alert">laden van gegevens.</div>
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
import StudentsList from '@/components/UI/organisms/StudentsList.vue'

@Options({
  components: {
    StudentsList,
    ProposalsList,
    Button,
    Footer,
    Header
  },
  data () {
    return {
      companies: null,
      students: null,
      companyId: store.getters.getCompanyId,
      nothingFound: false,
      nothingFoundStudents: false,
      loading: false,
      loadingStudents: false,
      error: null
    }
  },
  created () {
    this.fetchData()
    this.fetchStudentData()
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
    },
    fetchStudentData () {
      this.loadingStudents = true
      myAxios.get('api/students')
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFoundStudents = true
          }
          this.students = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        }).finally(() => {
          this.loadingStudents = false
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
.my-students {
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
