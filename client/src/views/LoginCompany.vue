<template>
  <div class="login-area login-s2">
    <div class="container">
      <div class="login-box box-center">
        <Form :title="'Login as a company'" :buttonText="'Login'"/>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import Form from '@/components/UI/molecules/LoginForm.vue'

@Options({
  components: {
    Form
  }
})
export default class LoginCompany extends Vue {
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
  box-shadow: inset 0 0 51px rgba(0, 0, 0, 0.1);
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
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto
}

.box-center {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 100vh;
}
</style>
