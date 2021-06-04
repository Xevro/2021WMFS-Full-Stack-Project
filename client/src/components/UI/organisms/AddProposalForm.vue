<template>
  <form novalidate @submit.prevent="verzend">
    <div class="box-center">
      <!-- <InputField id="title" required="true" v-model="title" label="Titel voorstel" type="text" :error="titleError"/> -->
      <InputField class="input-field" required="true" type="date" id="startperiod" v-model="startPeriod" label="Start periode" :error="startPeriodError"/>
      <InputField class="input-field" required="true" type="date" id="endperiod" v-model="endPeriod" label="Eind periode" :error="endPeriodError"/>
      <InputTextArea class="input-field" required="true" type="text" id="description" label="Beschrijving" v-model="description" :error="descriptionError"/>
      <Error v-if="error" :value="error"/>
      <div class="loading" v-show="loading" role="alert">Even geduld</div>
      <div class="button-area">
        <Button :disabled="submitted" :type="'submit'">Voeg voorstel toe</Button>
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
  name: 'CompanyProposalsAdd',
  components: {
    InputField,
    InputTextArea,
    Button,
    Error
  },
  data () {
    return {
      companyId: this.$route.params.id,
      title: null,
      startPeriod: null,
      endPeriod: null,
      description: null,
      error: null,
      submitted: false
    }
  },
  computed: {
    titleError () {
      if (!this.submitted) {
        return null
      }
      if (!this.title) {
        return 'Het titel veld is een verplicht veld en werd niet ingevuld.'
      }
      return null
    },
    startPeriodError () {
      if (!this.submitted) {
        return null
      }
      if (!this.startPeriod) {
        return 'Het start periode veld is een verplicht veld en werd niet ingevuld.'
      }
      if (!regexDate.test(this.startPeriod)) {
        return 'De opgegeven datum voldoet niet aan de vereisten'
      }
      return null
    },
    endPeriodError () {
      if (!this.submitted) {
        return null
      }
      if (!this.endPeriod) {
        return 'Het eind periode veld is een verplicht veld en werd niet ingevuld.'
      }
      if (!regexDate.test(this.endPeriod)) {
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
      return this.startPeriodError || this.endPeriodError || this.descriptionError // this.titleError ||
    }
  },
  methods: {
    async verzend () {
      this.submitted = true
      if (this.hasErrors) {
        this.error = 'Het formulier bevat nog fouten'
        this.submitted = false
        return null
      } else {
        this.error = null
      }
      this.loading = true
      try {
        await myAxios.post('api/companies/' + this.companyId + '/proposals', {
          description: this.description,
          start_period: this.startPeriod,
          end_period: this.endPeriod
        }).then(() => {
          this.$router.push({ name: 'CompanyHome' })
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
        this.loading = false
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
