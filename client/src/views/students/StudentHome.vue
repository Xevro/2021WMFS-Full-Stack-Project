<template>
  <div class="page">
    <Header/>
    <div class="lists">
      <ProposalsList :data="companies" title="Overzicht van alle stage voorstellen"/>
      <p v-if="nothingFound">Geen stages gevonden</p>
      <div v-if="loadingCompanies" role="alert">laden van gegevens.</div>
      <div class="liked-list">
        <liked-proposals-list :data="likedProposals" title="Mijn favoriete stage voorstellen"/>
        <p v-if="nothingFoundProposals">Geen favoriete voorstellen gevonden</p>
        <div v-if="loadingProposals" role="alert">laden van gegevens.</div>
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
  computed: {
    getStudentId () {
      return store.getters.getStudentId
    }
  },
  data () {
    return {
      companies: null,
      studentId: this.getStudentId,
      likedProposals: null,
      nothingFoundProposals: false,
      loadingProposals: false,
      nothingFound: false,
      loading: false,
      loadingCompanies: false,
      error: null
    }
  },
  created () {
    this.fetchData()
    this.fetchLikedProposalsData()
  },
  methods: {
    fetchData () {
      this.loadingCompanies = true
      myAxios.get('api/proposals')
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFound = true
          }
          this.companies = response.data.data
          return null
        })
        .catch(error => {
          console.log(error)
          this.errored = true
          this.nothingFound = true
        }).finally(() => {
          this.loadingCompanies = false
          return null
        })
      return null
    },
    fetchLikedProposalsData () {
      this.loadingProposals = true
      myAxios.get('api/students/' + this.getStudentId + '/likes')
        .then(response => {
          if (!response.data.data.length) {
            this.nothingFoundProposals = true
          }
          this.likedProposals = response.data.data
          return null
        })
        .catch(error => {
          console.log(error)
          this.errored = true
          this.nothingFoundProposals = true
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

.lists, .liked-list {
  padding-top: 120px;
}

.liked-list {
  margin-left: 100px;
  margin-right: 100px;
}

@media screen and (max-width: 700px) {
  .button-add-task {
    margin-top: 40px;
    margin-right: 20px;
    float: right;
  }
  .liked-list {
    margin: 0;
  }
}
</style>
