<template>
  <div class="page">
    <Header/>
    <div class="lists">
      <ProposalsList :data="companies" title="Al mijn stage voorstellen"/>
    </div>
  </div>
  <div class="footer">
    <Footer/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/HeaderCompany.vue'
import ProposalsList from '@/components/UI/organisms/ProposalsList.vue'

const companyGegevens = [
  {
    company: 'bedrijf1',
    created_on: '27-01-2021',
    start_date: '12-03-2021',
    end_date: '18-07-2021',
    description: 'stage voorstel beschrijving in bedrijf x...',
    status: 'vrij'
  },
  {
    company: 'bedrijf2',
    created_on: '10-02-2021',
    start_date: '12-05-2021',
    end_date: '07-06-2021',
    description: 'stage voorstel beschrijving in bedrijf x...',
    status: 'vrij'
  },
  {
    company: 'bedrijf3',
    created_on: '03-02-2021',
    start_date: '26-04-2021',
    end_date: '08-05-2021',
    description: 'stage voorstel beschrijving in bedrijf x...',
    status: 'vrij'
  },
  {
    company: 'bedrijf4',
    created_on: '27-04-2021',
    start_date: '12-03-2021',
    end_date: '18-07-2021',
    description: 'stage voorstel beschrijving in bedrijf x...',
    status: 'vrij'
  }
]
const company = [
  {
    company: 'bedrijf1',
    created_on: '27-01-2021',
    start_date: '12-03-2021',
    end_date: '18-07-2021',
    description: 'stage voorstel beschrijving in bedrijf x...',
    status: 'vrij'
  }
]

@Options({
  components: {
    ProposalsList,
    Footer,
    Header
  },
  data () {
    return {
      companies: companyGegevens
    }
  }
})
export default class CompanyProposals extends Vue {
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

.lists {
  padding-top: 120px;
}
</style>
