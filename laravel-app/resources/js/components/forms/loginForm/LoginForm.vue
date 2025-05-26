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
                const response = await fetch("/api/login", {
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

                if (response.ok) {
                    const data = await response.json();
                    console.log(data);
                    this.$toast.success("Connection reussie");
                    localStorage.setItem("authToken", data.access_token);
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
