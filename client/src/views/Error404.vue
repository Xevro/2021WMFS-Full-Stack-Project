<template>
  <div class="error-box">
    <div class="container">
      <div class="error-content">
        <h2>Error 404</h2>
        <p>Ooops! Deze pagina kon niet worden gevonden.</p>
        <router-link class="link" to="/">Ga terug naar de startpagina</router-link>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'

@Options({})
export default class Error404 extends Vue {
}
</script>

<style scoped>
.error-box {
  padding: 100px 0;
  text-align: center;
}

.container {
  width: 100%;
  margin-right: auto;
  margin-left: auto;
}

a {
  text-decoration: none;
  color: #0b5cb8;
  font-weight: bold;
  font-size: 1rem;
}

.error-content {
  background: #fff;
  width: 100%;
  font-size: 1rem;
  max-width: 600px;
  margin: auto;
  padding: 70px 30px;
}

h2 {
  font-size: 2.3rem;
}
</style>
