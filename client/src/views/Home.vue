<template>
  <div class="page">
  <Header/>
  <div class="lists">
    <List :data="companies" title="Overzicht van alle stage voorstellen"></List>
  </div>
  <Footer/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Button from '@/components/UI/atoms/Button.vue'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/Header.vue'
import List from '@/components/UI/organisms/List.vue'
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

@Options({
  components: {
    List,
    Button,
    Footer,
    Header
  },
  data () {
    return {
      companies: companyGegevens
    }
  }
})
export default class Home extends Vue {
}
</script>

<style scoped>
.page {
  position: relative;
}

.lists {
  padding-top: 120px;
}
</style>
