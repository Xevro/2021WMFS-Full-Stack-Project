<template>
  <div class="page">
    <Header/>
    <div class="content">
      <div class="title-part">
        <p>Voeg een stage voorstel toe</p>
        <p>Het stage voorstel zal niet meteen zichtbaar zijn. U zal bericht krijgen van de stagecoördinator wanneer dit gevalideerd is.
          U kan per stage voorstel 1 student koppelen aan een project of opdracht binnen het bedrijf.</p>
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

.title-part {
  text-align: left;
  margin-left: 120px;
  margin-right: 200px;
}

.title-part p:first-child {
  font-size: 1.5rem;
  font-weight: bold;
}

.title-part p:nth-child(2) {
  font-size: 1.1rem;
}

.content {
  padding-top: 100px;
}

@media screen and (max-width: 700px) {
  .title-part {
    margin-left: 50px;
    margin-right: 50px;
  }
}
</style>
