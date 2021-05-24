<template>
  <div class="page">
    <Header :type-user="'student'"/>
    <div class="lists">
      <TasksList :data="tasks" title="Mijn taken"/>
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
const tasks = [
  {
    date: '27-01-2021',
    description: 'Nieuwe taak toevoegd op mijn stage'
  },
  {
    date: '28-01-2021',
    description: 'Netwerken ingesteld met httpd'
  },
  {
    date: '29-01-2021',
    description: 'Server herstart... Fout gevonden...'
  }
]
@Options({
  name: 'StudentTasks',
  components: {
    TasksList,
    Header,
    Footer
  },
  data () {
    return {
      tasks: tasks
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
