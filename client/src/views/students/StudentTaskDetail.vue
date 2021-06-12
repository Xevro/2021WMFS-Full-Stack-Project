<template>
  <div class="page">
    <Header/>
    <div v-if="error" class="content">
      <p>Kon de gegevens niet ophalen.</p>
    </div>
    <div v-if="loading" class="content">
      <p>Bezig met het ophalen van de gegevens.</p>
    </div>
    <div v-if="details" class="content">
      <div class="content-info-box">
        <h2>Details van de stagetaak op {{ details.date }}</h2>
        <div class="information-box">
          <p class="title">Taak beschrijving</p>
          <p>{{ details.task }}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <Footer/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Footer from '@/components/UI/organisms/Footer.vue'
import Header from '@/components/UI/organisms/Header.vue'
import { myAxios } from '@/main'

@Options({
  name: 'StudentTaskDetail', // studentId  taskId
  components: {
    Footer,
    Header
  },
  data () {
    return {
      details: null,
      studentId: this.$route.params.studentId,
      taskId: this.$route.params.taskId,
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
      myAxios.get('api/students/' + this.studentId + '/tasks/' + this.taskId)
        .then(response => {
          if (response.data.data[0] == null) {
            this.error = true
            return
          }
          this.details = response.data.data[0]
        })
        .catch(error => {
          console.log(error)
          this.error = true
        }).finally(() => {
          this.loading = false
          return null
        })
      return null
    }
  }
})
export default class StudentTaskDetail extends Vue {
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

.title {
  font-size: 1.2rem;
  font-weight: bold;
}

.information-box {
  width: 70%;
}

.content {
  padding-top: 120px;
  margin-left: 120px;
  margin-right: 120px;
  text-align: left;
}

@media screen and (max-width: 700px) {
  .information-box {
    width: 100%;
  }

  .content-info-box {
    padding-top: 3.125rem;
  }

  .content {
    padding-top: 80px;
    margin-left: 80px;
    margin-right: 80px;
    text-align: left;
  }
}
</style>
