<template>
  <form novalidate @submit.prevent="Verzend">
    <div class="box-center">
      <InputField class="input-field" required="true" type="date" id="date" v-model="date" label="Datum" :error="dateError"/>
      <InputTextArea class="input-field" required="true" id="description" type="text" label="Beschrijving" v-model="description" :error="descriptionError"/>
      <Error v-if="error" :value="error"/>
      <div class="button-area">
        <Button :type="'submit'">Voeg taak toe</Button>
      </div>
    </div>
  </form>
</template>

<script>
import InputField from '@/components/UI/molecules/InputTextField'
import InputTextArea from '@/components/UI/molecules/InputTextArea'
import Button from '@/components/UI/atoms/Button'
import Error from '@/components/UI/atoms/Error'

const regexDate = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/

export default {
  name: 'AddTaskForm',
  components: {
    InputField,
    InputTextArea,
    Button,
    Error
  },
  data () {
    return {
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
    async Verzend () {
      this.submitted = true

      if (this.hasErrors) {
        this.error = 'Het formulier bevat nog fouten'
        return null
      } else {
        this.error = null
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
  margin-top: 10px;
}

.button-area {
  margin-top: 20px;
}
</style>
