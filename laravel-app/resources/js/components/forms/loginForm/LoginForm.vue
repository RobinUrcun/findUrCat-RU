<template>
  <div>
    <form @submit.prevent="fetchData" class="form loginForm">
      <InputForm name="email" type="email" label="Adresse mail :" />
      <InputForm name="password" type="password" label="Mot de passe :" />
      <button>Créer un compte</button>
    </form>
  </div>
</template>

<script>
import InputForm from "../InputForm.vue";
export default {
  components: {
    InputForm,
  },
  methods: {
    async fetchData(e) {
      try {
        console.log(e.target.elements.email.value);
        const tryToLog = await this.$store.dispatch("login", {
          email: e.target.elements.email.value,
          password: e.target.elements.password.value,
        });
        console.log(tryToLog);

        if (tryToLog.status === 200) {
          this.$toast.success("Connection reussie");
          this.$router.push("/");
        } else {
          this.$toast.error("Identifiants incorrects");
        }
      } catch (error) {
        this.$toast.error("Identifiants incorrects");
      }
    },
  },
};
</script>
