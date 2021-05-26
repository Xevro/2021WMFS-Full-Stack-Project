<template>
  <form novalidate @submit.prevent="Login">
    <FormTitle :title="title"/>
      <InputTextField id="email" required="true" v-model="email" label="E-mail" type="email" :error="emailError"/>
      <InputTextField id="password" required="true" v-model="password" label="Wachtwoord" type="password" :error="passwordError"/>
      <Error v-if="error" :value="error"/>
      <div class="loading" v-show="loading" role="alert">Even geduld</div>
      <div class="button-area">
        <Button :type="'submit'">Login</Button>
      </div>
  </form>
</template>

<script>
import Button from '@/components/UI/atoms/Button.vue'
import Error from '@/components/UI/atoms/Error.vue'
import FormTitle from '@/components/UI/atoms/FormTitle.vue'
import InputTextField from '@/components/UI/molecules/InputTextField'
const regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
const regexDigits = /\d/
const regexCapital = /[A-Z]/

export default {
  name: 'Login',
  props: ['title'],
  components: {
    InputTextField,
    Button,
    FormTitle,
    Error
  },
  data () {
    return {
      email: null,
      password: null,
      error: null,
      submitted: false,
      loading: false
    }
  },
  computed: {
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
    hasErrors () {
      return this.emailError || this.passwordError
    }
  },
  methods: {
    async Login () {
      this.submitted = true
      this.loading = true

      try {
        await this.axios.get('sanctum/csrf-cookie')
        const { data } = await this.axios.post(
          'sanctum/login',
          {
            email: 'louis.dhont@student.odisee.be',
            password: 'Azerty123'
          }
        )
        console.log(data)
      } catch (e) {
        console.error(e)
      }

      if (this.hasErrors) {
        this.error = 'Het formulier bevat nog fouten'
        return null
      } else {
        this.error = null
      }
      // use .finally code in fetch to set the loading variable false
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
