<template>
  <div class="page">
    <Header :type-user="'student'"/>
    <div class="lists">
      <ProposalsList :data="companies" title="Overzicht van alle stage voorstellen"/>
      <p v-if="nothingFound">Geen stages gevonden</p>
      <div v-if="loading" role="alert">laden van gegevens.</div>
      <div class="button-add-task">
        <Button :href="'/students/1/tasks/add'">Voeg een taak toe</Button>
      </div>
      <div class="lists">
        <liked-proposals-list :data="likedProposals" title="Mijn leukgevonden stage voorstellen"/>
        <p v-if="nothingFound">Geen stages gevonden</p>
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
import Button from '@/components/UI/atoms/Button.vue'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/Header.vue'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'
import { myAxios } from '@/main'
import store from '@/store/index'
import LikedProposalsList from '@/components/UI/organisms/LikedProposalsList.vue'

@Options({
  name: 'StudentHome',
  components: {
    LikedProposalsList,
    ProposalsList,
    Button,
    Footer,
    Header
  },
  data () {
    return {
      companies: null,
      studentId: 1,
      likedProposals: null,
      nothingFoundProposals: false,
      loadingProposals: false,
      nothingFound: false,
      loading: false,
      error: null
    }
  },
  created () {
    this.fetchData()
    this.fetchLikedProposalsData()
  },
  methods: {
    fetchData () {
      // this.error = this.post = null
      this.loading = true
      myAxios.get('api/proposals')
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
    fetchLikedProposalsData () {
      // this.error = this.post = null
      this.loadingProposals = true
      myAxios.get('api/students/' + 1 + '/likes')
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFoundProposals = true
          }
          this.likedProposals = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        }).finally(() => {
          this.loadingProposals = false
          return null
        })
      return null
    }
  }
})
export default class studentHome extends Vue {
}
</script>

<style scoped>
.button-add-task {
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

@media screen and (max-width: 700px) {
  .button-add-task {
    margin-top: 40px;
    margin-right: 20px;
    float: right;
  }
}
</style>
