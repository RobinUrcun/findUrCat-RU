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
      const fetchData = await fetch("/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify({
          email: e.target.email.value,
          password: e.target.password.value,
        }),
        credentials: "include",
      });

      if (fetchData.ok) {
        console.log("ok");
      } else {
        console.log("pas ok");
      }
    },
  },
};
</script>
