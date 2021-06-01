<template>
  <div class="page">
    <Header :type-user="'student'"/>
    <div class="lists">
      <TasksList :data="tasks" title="Mijn taken"/>
      <div v-if="loading" role="alert">laden van gegevens.</div>
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
import { myAxios } from '@/main'

@Options({
  name: 'StudentTasks',
  components: {
    TasksList,
    Header,
    Footer
  },
  data () {
    return {
      tasks: null,
      studentId: this.$route.params.id,
      loading: false,
      error: null
    }
  },
  created () {
    this.fetchData()
  },
  methods: {
    fetchData () {
      // this.error = this.post = null
      this.loading = true
      myAxios.get('api/students/' + this.studentId + '/tasks')
        .then(response => {
          this.tasks = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
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

.lists {
  padding-top: 120px;
}
</style>
