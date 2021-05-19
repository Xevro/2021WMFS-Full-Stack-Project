<template>
  <form novalidate @submit.prevent="tryLogin">
    <FormTitle :title="title"/>
    <div class="login-div">
      <label :for="id">{{ label }}</label>
      <InputTextField id="email" required="true" v-model="email" label="E-mail" type="email" :error="emailError"/>
      <InputTextField id="password" required="true" v-model="password" label="Wachtwoord" type="password" :error="passwordError"/>
      <Error v-if="error" :value="error"/>
      <div class="button-area">
        <Button type="submit">Login</Button>
      </div>
    </div>
  </form>
</template>

<script>
import Button from '@/components/UI/atoms/Button.vue'
import Error from '@/components/UI/atoms/Error.vue'
import FormTitle from '@/components/UI/atoms/FormTitle.vue'
import InputTextField from '@/components/UI/molecules/InputTextField'

export default {
  name: 'Form',
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
      submitted: false
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
      return null
    },
    passwordError () {
      if (!this.submitted) {
        return null
      }
      if (!this.password) {
        return 'Het wachtwoord veld is verplicht en werd niet ingevuld.'
      }
      return null
    },
    hasErrors () {
      return this.emailError || this.emailError
    }
  },
  methods: {
    async tryLogin () {
      this.submitted = true

      if (this.hasErrors) {
        this.error = 'Het formulier bevat nog fouten'
        return null
      }
    }
  }
}
</script>

<style scoped>
.login-div {
  margin-top: 10px;
}

.button-area {
  margin-top: 20px;
  float: left;
}
</style>
