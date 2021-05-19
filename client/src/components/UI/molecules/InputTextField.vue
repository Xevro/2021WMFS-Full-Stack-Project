<template>
  <div class="form-group">
    <label :for="id">{{ label }}</label>
    <input :id="id" :required="required" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
    <Error :value="error"/>
  </div>
</template>

<script>
import Error from '@/components/UI/atoms/Error'
export default {
  name: 'InputTextField',
  components: { Error },
  props: ['modelValue', 'required', 'label', 'id', 'type', 'value', 'error']
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
  min-width: 250px;
}
</style>
