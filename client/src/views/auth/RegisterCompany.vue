<template>
  <div class="login-area login-s2">
    <div class="container">
      <div class="login-box box-center">
        <RegisterForm :title="'Login as a company'" :buttonText="'Login'"/>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import RegisterForm from '@/components/UI/organisms/RegisterForm.vue'

@Options({
  components: {
    RegisterForm
  }
})
export default class RegisterCompany extends Vue {
}
</script>

<style scoped>
.login-s2 {
  background: #fff;
  position: relative;
  z-index: 1;
  overflow: hidden;
}

.login-s2:before {
  content: '';
  position: absolute;
  height: 206%;
  width: 97%;
  background: #fcfcff;
  border-radius: 50%;
  left: -42%;
  z-index: -1;
  top: -47%;
  box-shadow: inset 0 0 3.1875rem rgba(0, 0, 0, 0.1);
}

.login-area {
  background: #F3F8FB;
}

.login-box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  min-height: 100vh;
}

.container {
  width: 100%;
  padding-right: 1rem;
  padding-left: 1rem;
  margin-right: auto;
  margin-left: auto
}

.box-center {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: left;
  min-height: 100vh;
}
</style>
