<template>
  <form>
    <div class="box-center">
      <InputField class="input-field" type="date" title="Datum" placeholder="Datum"/>
      <InputTextArea class="input-field" type="text" title="Beschrijving" placeholder="Typ hier uw tekst..."/>
      <div class="button-area">
        <Button :type="'submit'">{{ buttonText }}</Button>
      </div>
    </div>
  </form>
</template>

<script>
import InputField from '@/components/UI/molecules/InputTextField'
import InputTextArea from '@/components/UI/molecules/InputTextArea'
import Button from '@/components/UI/atoms/Button'

export default {
  name: 'AddTaskForm',
  props: ['buttonText'],
  components: {
    InputField,
    InputTextArea,
    Button
  }
}
</script>

<style scoped>
.box-center {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.input-field  {
  margin-top: 10px;
}

.error-message {
  font-size: 0.9rem;
  color: #bd2130;
  text-align: left;
}

.button-area {
  margin-top: 20px;
}
</style>
