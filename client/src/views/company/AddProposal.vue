<template>
  <div class="page">
    <Header/>
    <div class="content">
      <div class="title-part">
        <p>Voeg een taak toe</p>
        <p>Voeg uw gegevens toe per dag met een beschrijving van uw stage opdracht.</p>
      </div>
      <AddProposalForm :buttonText="'Voeg voorstel toe'"/>
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
import AddProposalForm from '@/components/UI/molecules/AddProposalForm.vue'

@Options({
  components: {
    AddProposalForm,
    Footer,
    Header
  }
})
export default class AddProposal extends Vue {
}
</script>
