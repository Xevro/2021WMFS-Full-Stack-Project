<template>
  <div class="page">
    <Header :type-user="'student'"/> <!-- wijzig dit met het storage atribuut -->
    <div class="content">
          <ContractsList :data="company" title="Mijn contracten"/>
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
import ContractsList from '@/components/UI/organisms/ContractsList.vue'

const company = [
  {
    company: 'bedrijf1',
    created_on: '27-01-2021',
    start_date: '12-03-2021',
    end_date: '18-07-2021',
    description: 'stage voorstel beschrijving in bedrijf x...'
  }
]

@Options({
  components: {
    Footer,
    Header,
    ContractsList
  },
  data () {
    return {
      studentid: this.$route.params.id,
      company: company
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

</style>
