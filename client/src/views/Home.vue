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
import Footer from '@/components/UI/atoms/Footer.vue'
import Header from '@/components/UI/atoms/Header.vue'
import List from '@/components/UI/organisms/List.vue'
import companiesGegevens from '@/dummy_data/data.js'

@Options({
  components: {
    List,
    Button,
    Footer,
    Header
  },
  data () {
    return {
      companies: companiesGegevens
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
