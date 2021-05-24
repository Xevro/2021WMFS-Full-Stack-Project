<template>
  <a v-if="type !== 'submit'" @click="navigateTo(href)" class="button"><slot/></a>
  <button v-if="type === 'submit'" class="button" type="submit"><slot/></button>
</template>

<script>
export default {
  name: 'Button',
  props: ['type', 'href'],
  methods: {
    navigateTo (href) {
      this.$router.push({ path: href })
    }
  }
}
</script>

<style scoped>
.button {
  background-color: #1A7EF2;
  border: none;
  border-radius: 5px;
  color: white;
  padding: 7px 1.6875rem;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: .9375rem;
  margin: 4px 2px;
  cursor: pointer;
}

.button:hover {
  background-color: #0b5cb8;
}
</style>
