<template>
  <div class="page">
    <Header/>
    <div class="content">
    <p>Detail pagina van proposal</p>
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

@Options({
  components: {
    Footer,
    Header
  }
})
export default class ProposalDetails extends Vue {
}
</script>

<style scoped>
.content {
  padding-top: 120px;
}
</style>
