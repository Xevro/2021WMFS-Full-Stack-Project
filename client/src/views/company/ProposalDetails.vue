<template>
  <div class="page">
    <Header/>
    <div class="content">
      <div class="add-to-favorites">
        <p>Voeg toe aan favorieten</p>
      </div>
      <div class="content-info-box">
      <h3 class="title-page">Stage voorstel #1</h3>
      <p>De stage loop van 23-03-2021 tot 29-06-2021.</p>
      <p>Bedrijf: BVBA E&Y</p>
      <div class="information-box">
      <p class="title">Stage beschrijving</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis et, adipiscing non, eu scelerisque nec feugiat enim. Nunc nisi, cursus in a curabitur. Metus id ornare duis feugiat tortor magna sed.Dictumst sed faucibus varius arcu a mi enim. A tellus rhoncus nunc enim eu, semper ut tellus. Augue quam viverra at ut duis arcu, tellus vestibulum consequat. Dolor praesent nec maecenas turpis egestas ipsum et dignissim.</p>
        <p>Dis amet, ut ipsum magna condimentum libero, gravida elementum tellus. Eget aliquam purus sed id. Massa amet, semper amet, augue eu suspendisse ornare. Risus ullamcorper dolor nulla consequat est vulputate mattis. Leo, volutpat ligula suspendisse vestibulum scelerisque tincidunt at est. Feugiat quis dis commodo leo ut cursus pulvinar.</p>
        </div>
      </div>
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

.title {
  font-size: 1.2rem;
  font-weight: bold;
}

.title-page {
  font-size: 1.5rem;
  font-weight: bold;
}

.information-box {
 width: 50%;
}

.add-to-favorites {
  width: 200px;
  float: right;
}

.content {
  padding-top: 120px;
  margin-left: 120px;
  margin-right: 120px;
  text-align: left;
}

@media screen and (max-width: 700px) {
  .information-box {
    width: 100%;
  }
  .add-to-favorites {
    float: left;
  }
  .content-info-box {
    padding-top: 50px;
  }
}
</style>
