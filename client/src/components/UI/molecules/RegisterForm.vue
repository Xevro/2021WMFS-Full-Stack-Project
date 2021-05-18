<template>
  <form>
    <FormTitle :title="title"/>
    <div class="login-div">
      <InputField class="input-field" type="text" title="Naam" placeholder="Naam"/>
      <InputField class="input-field" type="text" title="KBO nummer" placeholder="xxxx.xxx.xxx"/>
      <InputField class="input-field" type="text" title="Email" placeholder="Email"/>
        <p class="error-message">E-mailadres is geen geldig e-mailadres.</p>
      <InputField class="input-field" type="password" title="Wachtwoord" placeholder="Wachtwoord"/>
      <InputField class="input-field" type="password" title="Wachtwoord controle" placeholder="Wachtwoord controle"/>
        <p class="error-message">Beide wachtwoorden komen niet overeen.</p>
      <div class="button-area">
        <Button>{{ buttonText }}</Button>
      </div>
    </div>
  </form>
</template>

<script>
import InputField from '@/components/UI/atoms/InputTextField'
import Button from '@/components/UI/atoms/Button'
import FormTitle from '@/components/UI/atoms/FormTitle'

export default {
  name: 'Form',
  props: ['buttonText', 'title'],
  components: {
    InputField,
    Button,
    FormTitle
  }
}
</script>

<style scoped>
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
  float: left;
}
</style>
