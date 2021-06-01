<template>
 <div id="app">
    <router-view/>
   <div class="loading" v-if="loading" role="alert">U wordt automatisch ingelogd.</div>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  data () {
    return {
      loading: false
    }
  },
  methods: {
    ...mapActions(['tryLogIn'])
  },
  created () {
    this.loading = true
    // this.tryLogIn().finally(() => (this.loading = false))
  }
}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

body {
  margin: 0;
  padding: 0;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
