<template>
  <p>{{ title }}</p>
</template>

<script>
export default {
  name: 'FormTitle',
  props: ['title']
}
</script>

<style scoped>
p {
  font-size: 1.1rem;
}
</style>
