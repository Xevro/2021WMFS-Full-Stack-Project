<template>
  <div class="form-group">
    <input :type="type" class="form-control" :name="name" v-bind:value="value" :placeholder="placeholder">
  </div>
</template>

<script>
export default {
  name: 'InputSearchField',
  props: ['type', 'value', 'placeholder', 'name']
}
</script>

<style scoped>
label {
  display:block;
  margin-top: 20px;
  margin-bottom: 5px;
  font-size: 0.95rem;
  text-align: left;
}

input {
  padding: 14px 15px;
  border-radius: 10px;
  border: 0;
  box-shadow: 0 10px 25px 0 rgba(0, 0, 0, 0.1);
  transition: all 0.25s ease;
  min-width: 200px;
}
</style>
