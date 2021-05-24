<template>
  <div class="page">
  <Header :type-user="'student'"/>
  <div class="lists">
    <ProposalsList :data="companies" title="Overzicht van alle stage voorstellen"/>
    <div class="button-add-task">
    <Button :href="'/students/tasks/add'">Voeg een taak toe</Button>
    </div>
    <div class="my-contract">
      <ContractsList :data="company" title="Mijn contract"/>
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
import ContractsList from '@/components/UI/organisms/ContractsList.vue'

// import datas from '../../dummy_data/data.js'
// data.js gaf fouten bij de from '...', zeer vreemd
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
    description: 'stage voorstel beschrijving in bedrijf x...'
  }
]

@Options({
  name: 'studentHome',
  components: {
    ProposalsList,
    ContractsList,
    Button,
    Footer,
    Header
  },
  data () {
    return {
      companies: companyGegevens,
      company: company
    }
  },
  methods: {
  }
})
export default class studentHome extends Vue {
}
</script>

<style scoped>
.my-contract {
  margin-top: 100px;
}

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
