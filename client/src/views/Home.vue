<template>
  <Header/>
  <div class="lists">
    <List/>
  </div>
  <Footer/>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Button from '@/components/UI/atoms/Button.vue'
import Footer from '@/components/UI/atoms/Footer.vue'
import Header from '@/components/UI/atoms/Header.vue'
import List from '@/components/UI/organisms/List.vue'

@Options({
  components: {
    List,
    Button,
    Footer,
    Header
  }
})
export default class Home extends Vue {
}
</script>

<style scoped>
.lists {
  padding-top: 120px;
}
</style>
