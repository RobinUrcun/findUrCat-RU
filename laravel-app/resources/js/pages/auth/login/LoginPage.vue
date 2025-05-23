<template>
  <section class="loginSection">
    <h1>Connection</h1>
    <LoginForm />
  </section>
</template>

<script>
import LoginForm from "../../../components/forms/loginForm/LoginForm.vue";
export default {
  components: {
    LoginForm,
  },
};
</script>