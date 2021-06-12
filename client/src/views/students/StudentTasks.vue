<template>
  <div class="page">
    <Header/>
    <div class="lists">
      <TasksList :data="tasks" title="Mijn taken"/>
      <p v-if="nothingFound">Geen taken gevonden</p>
      <div v-if="loading" role="alert">laden van gegevens.</div>
      <div class="button-add-task">
        <Button :href="'/students/' + studentId + '/tasks/add'">Voeg een taak toe</Button>
      </div>
    </div>
  </div>
  <div class="footer">
    <Footer/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import TasksList from '@/components/UI/organisms/TasksList.vue'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/Header.vue'
import Button from '@/components/UI/atoms/Button.vue'
import { myAxios } from '@/main'

@Options({
  name: 'StudentTasks',
  components: {
    TasksList,
    Button,
    Header,
    Footer
  },
  data () {
    return {
      tasks: null,
      studentId: this.$route.params.id,
      nothingFound: false,
      loading: false,
      error: null
    }
  },
  created () {
    this.fetchData()
  },
  methods: {
    fetchData () {
      this.loading = true
      myAxios.get('api/students/' + this.studentId + '/tasks')
        .then(response => {
          if (response.data.data.length === 0) {
            this.nothingFound = true
            return null
          }
          this.tasks = response.data.data
          this.nothingFound = false
          return null
        })
        .catch(error => {
          console.log(error)
          this.error = 'Er is een onverwachte fout opgetreden.'
          this.nothingFound = true
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    }
  }
})
export default class StudentTasks extends Vue {
}
</script>

<style scoped>
.page {
  min-height: 80vh;
  overflow: hidden;
  display: block;
  position: relative;
}

.footer {
  position: relative;
  bottom: 0;
  width: 100%;
  margin-top: 3.125rem;
}

.button-add-task {
  margin-top: 40px;
  margin-right: 100px;
  float: right;
}

.lists {
  padding-top: 120px;
}
</style>
