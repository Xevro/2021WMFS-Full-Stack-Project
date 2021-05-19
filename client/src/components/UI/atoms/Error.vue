<template>
  <span class="error-message">{{ value }}</span>
</template>

<script>
export default {
  name: 'Error',
  props: ['value']
}
</script>

<style scoped>
.error-message {
  display: block;
  width: 300px;
  margin-top: .3rem;
  font-size: .8rem;
  color: #bd2130;
  text-align: left;
}
</style>
