<template>
<p>student details</p>
  <form novalidate>
    <input id="name" label="Naam" type="text" :error="error"/>
  </form>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'

@Options({
  data () {
    return {
      id: this.$route.params.id
    }
  },
  computed: {
    error () {
      console.log(this.id)
    }
  }
})
export default class StudentDetails extends Vue {
}
</script>
