<template>
  <Header/>
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
export default class AddTask extends Vue {
}
</script>
