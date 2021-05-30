<template>
  <form novalidate @submit.prevent="tryRegistreer">
    <FormTitle :title="title"/>
      <InputTextField id="name" required="true" v-model="name" label="Naam" type="text" :error="nameError"/>
      <InputTextField id="kboNumber" required="true" v-model="kboNumber" label="KBO nummer" type="text" :error="kboNumberError"/>
      <InputTextField id="email" required="true" v-model="email" label="E-mail" type="email" :error="emailError"/>
      <InputTextField id="password" required="true" v-model="password" label="Wachtwoord" type="password" :error="passwordError"/>
      <InputTextField id="passwordCheck" required="true" v-model="passwordCheck" label="Wachtwoord controle" type="password" :error="passwordCheckError"/>
      <Error v-if="error" :value="error"/>
      <div class="button-area">
        <Button :disabled="submitted" :type="'submit'">Registreer</Button>
      </div>
  </form>
</template>

<script>
import InputTextField from '@/components/UI/molecules/InputTextField'
import FormTitle from '@/components/UI/atoms/FormTitle'
import Error from '@/components/UI/atoms/Error'
import Button from '@/components/UI/atoms/Button'

const regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
const regexKbo = /^[01]\d{3}\.\d{3}\.\d{3}$/
const regexDigits = /\d/
const regexCapital = /[A-Z]/

export default {
  name: 'CompanyRegister',
  props: ['title'],
  components: {
    InputTextField,
    FormTitle,
    Button,
    Error
  },
  data () {
    return {
      name: null,
      kboNumber: null,
      email: null,
      password: null,
      passwordCheck: null,
      error: null,
      submitted: false
    }
  },
  computed: {
    nameError () {
      if (!this.submitted) {
        return null
      }
      if (!this.name) {
        return 'Het naam veld is verplicht en werd niet ingevuld.'
      }
      return null
    },
    kboNumberError () {
      if (!this.submitted) {
        return null
      }
      if (!this.kboNumber) {
        return 'Het KBO nummer veld is verplicht en werd niet ingevuld.'
      }
      if (!regexKbo.test(this.kboNumber)) {
        return 'Het opgegeven KBO nummer voldoet niet aan het \'xxxx.xxx.xxx\' formaat.'
      }
      return null
    },
    emailError () {
      if (!this.submitted) {
        return null
      }
      if (!this.email) {
        return 'Email is een verplicht veld en werd niet ingevuld.'
      }
      if (!regexEmail.test(this.email)) {
        return 'Het opgegeven e-mailadres voldoet niet aan de vereisten'
      }
      return null
    },
    passwordError () {
      if (!this.submitted) {
        return null
      }
      if (!this.password) {
        return 'Het wachtwoord veld is verplicht en werd niet ingevuld.'
      }
      if (this.password.length < 8) {
        return 'Het wachtwoord moet minstens 8 karakters lang zijn.'
      }
      if (!regexDigits.test(this.password)) {
        return 'Het wachtwoord moet minstens 1 een nummer bevatten.'
      }
      if (!regexCapital.test(this.password)) {
        return 'Het wachtwoord moet minstens 1 een hoofdletter bevatten.'
      }
      return null
    },
    passwordCheckError () {
      if (!this.submitted) {
        return null
      }
      if (!this.password) {
        return 'Het wachtwoord controle veld is verplicht en werd niet ingevuld.'
      }
      if (this.password !== this.passwordCheck) {
        return 'Beide wachtwoorden komen niet overeen.'
      }
      return null
    },
    hasErrors () {
      return (this.nameError || this.kboNumberError || this.emailError || this.passwordError || this.passwordCheckError)
    }
  },
  methods: {
    async tryRegistreer () {
      this.submitted = true
      if (this.hasErrors) {
        this.error = 'Het formulier bevat nog fouten.'
        return null
      } else {
        this.submitted = false
        this.error = null
      }
    }
  }
}
</script>

<style scoped>
.button-area {
  margin-top: 1.25rem;
  float: left;
}
</style>
