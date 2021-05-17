<template>
  <div class="page">
    <Header/>
    <div class="content">
      <p>sdqdd</p>
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

@Options({
  components: {
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

.content {
  padding-top: 120px;
}
</style>
