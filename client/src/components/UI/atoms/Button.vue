<template>
  <a :href="href" class="button"><slot/></a>
</template>

<script>
export default {
  name: 'Button',
  props: ['href']
}
</script>

<style scoped>
.button {
  background-color: #1A7EF2;
  border: none;
  border-radius: 5px;
  color: white;
  padding: 7px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 4px 2px;
  cursor: pointer;
}

.button:hover {
  background-color: #0b5cb8;
}
</style>
