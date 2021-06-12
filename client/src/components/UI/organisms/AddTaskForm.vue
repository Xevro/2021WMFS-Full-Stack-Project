<template>
  <form novalidate @submit.prevent="verzend">
    <div class="box-center">
      <InputField class="input-field" required="true" type="date" id="date" v-model="date" label="Datum" :error="dateError"/>
      <InputTextArea class="input-field" required="true" id="description" type="text" label="Beschrijving" v-model="description" :error="descriptionError"/>
      <Error v-if="error" :value="error"/>
      <div class="loading" v-show="submitted" role="alert">Even geduld</div>
      <div class="button-area">
        <Button :disabled="submitted" :type="'submit'">Voeg taak toe</Button>
      </div>
    </div>
  </form>
</template>

<script>
import InputField from '@/components/UI/molecules/InputTextField'
import InputTextArea from '@/components/UI/molecules/InputTextArea'
import Button from '@/components/UI/atoms/Button'
import Error from '@/components/UI/atoms/Error'
import { myAxios } from '@/main'

const regexDate = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/

export default {
  name: 'StudentAddTask',
  components: {
    InputField,
    InputTextArea,
    Button,
    Error
  },
  data () {
    return {
      studentId: this.$route.params.id,
      date: null,
      description: null,
      error: null,
      submitted: false
    }
  },
  computed: {
    dateError () {
      if (!this.submitted) {
        return null
      }
      if (!this.date) {
        return 'Het datum veld is een verplicht veld en werd niet ingevuld.'
      }
      if (!regexDate.test(this.date)) {
        return 'De opgegeven datum voldoet niet aan de vereisten'
      }
      return null
    },
    descriptionError () {
      if (!this.submitted) {
        return null
      }
      if (!this.description) {
        return 'Het beschrijvings veld is verplicht en werd niet ingevuld.'
      }
      if (this.description.length < 10) {
        return 'De beschrijving moet minstens 10 karakters lang zijn.'
      }
      return null
    },
    hasErrors () {
      return this.dateError || this.descriptionError
    }
  },
  methods: {
    verzend () {
      this.submitted = true
      if (this.hasErrors) {
        this.error = 'Het formulier bevat nog fouten'
        this.submitted = false
        return null
      } else {
        this.error = null
      }
      try {
        myAxios.get('api/students/' + this.studentId + '/contract').then(async (response) => {
          if (response.data.data.length !== 0) {
            await myAxios.post('api/students/' + this.studentId + '/tasks', {
              task: this.description,
              date: this.date
            }).then(() => {
              this.$router.push({ name: 'StudentHome' })
            })
          } else {
            this.error = 'U hebt geen contract lopen om een taak over in te sturen.'
            this.submitted = false
            return null
          }
        })
      } catch (e) {
        if (e.response.status === 422) {
          this.error = 'Datum of beschrijving is niet correct.'
          return null
        }
        this.error = 'Er is een onverwachte fout opgetreden.'
        this.submitted = false
        return null
      } finally {
        this.submitted = false
      }
    }
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
  margin-top: 0.625rem;
}

.button-area {
  margin-top: 1.25rem;
}
</style>
