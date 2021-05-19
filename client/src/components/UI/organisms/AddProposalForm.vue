<template>
  <form>
    <div class="box-center">
      <InputField class="input-field" type="text" title="Titel voorstel" placeholder="Titel"/>
      <InputField class="input-field" type="date" title="Eind periode"/>
      <InputField class="input-field" type="date" title="Start periode"/>
      <InputTextArea class="input-field" type="text" title="Beschrijving " placeholder="Typ hier uw tekst..."/>
      <div class="button-area">
        <Button>{{ buttonText }}</Button>
      </div>
    </div>
  </form>
</template>

<script>
import InputField from '@/components/UI/molecules/InputTextField'
import InputTextArea from '@/components/UI/molecules/InputTextArea'
import Button from '@/components/UI/atoms/Button'

export default {
  name: 'AddProposalForm',
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
  text-align: center;
}
.input-field  {
  margin-top: 10px;
}

.button-area {
  margin-top: 20px;
}
</style>
