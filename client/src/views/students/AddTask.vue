<template>
  <div class="page">
    <Header/>
    <div class="content">
      <div class="title-part">
        <p>Voeg een taak toe</p>
        <p>Voeg uw gegevens toe per dag met een beschrijving van uw stage opdracht.</p>
      </div>
    <AddTaskForm :buttonText="'Voeg taak toe'"/>
    </div>
  </div>
  <div class="footer">
    <Footer/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/HeaderStudent.vue'
import AddTaskForm from '@/components/UI/molecules/AddTaskForm.vue'

@Options({
  components: {
    AddTaskForm,
    Footer,
    Header
  }
})
export default class AddTask extends Vue {
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
}

.title-part p:first-child {
  font-size: 1.5rem;
  font-weight: bold;
}

.title-part p:nth-child(2) {
  font-size: 1.1rem;
}

.content {
  padding-top: 120px;
}
</style>
