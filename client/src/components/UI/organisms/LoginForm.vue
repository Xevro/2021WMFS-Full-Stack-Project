<template>
  <form novalidate @submit.prevent="Login">
    <FormTitle :title="title"/>
    <InputTextField id="email" required="true" v-model="email" label="E-mail" type="email" :error="emailError"/>
    <InputTextField id="password" required="true" v-model="password" label="Wachtwoord" type="password" :error="passwordError"/>
    <Error v-if="error" :value="error"/>
    <div class="loading" v-show="loading" role="alert">Even geduld</div>
    <div class="txt-box">
    <p>Bent u een bedrijf en hebt u nog geen account? <router-link :to="{ name: 'CompanyRegister' }" class="register-txt">Klik hier</router-link></p>
    </div>
    <div class="button-area">
      <Button :disabled="submitted" :type="'submit'">Login</Button>
    </div>
  </form>
</template>

<script>
import { mapActions } from 'vuex'
import Button from '@/components/UI/atoms/Button.vue'
import Error from '@/components/UI/atoms/Error.vue'
import FormTitle from '@/components/UI/atoms/FormTitle.vue'
import InputTextField from '@/components/UI/molecules/InputTextField'
const regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

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
      email: 'hr@fleetmaster.com', // hr@fleetmaster.com  louis.dhont@student.odisee.be
      password: 'Azerty123',
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
      return null
    },
    hasErrors () {
      return this.emailError || this.passwordError
    }
  },
  methods: {
    ...mapActions(['logIn']),
    async Login () {
      this.submitted = true
      if (this.hasErrors) {
        return null
      }
      this.loading = true
      try {
        await this.logIn({
          email: this.email,
          password: this.password
        })
      } catch (e) {
        if (e.response.status === 422) {
          this.error = 'E-mail of wachtwoord is niet correct.'
          return null
        }
        this.error = 'Er is een onverwachte fout opgetreden.'
        this.submitted = false
        return null
      } finally {
        this.loading = false
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

.loading {
  margin-top: 15px;
  font-size: 1rem;
}

.txt-box {
  font-size: 0.9rem;
}

.register-txt {
  font-size: 0.9rem;
  color: #1A7EF2;
  text-decoration: none;
}
</style>
