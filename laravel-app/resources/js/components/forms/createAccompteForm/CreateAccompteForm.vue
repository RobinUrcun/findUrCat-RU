<template>
    <div>
        <form @submit.prevent="fetchData" class="form">
            <InputForm name="name" type="text" label="Nom :" />
            <InputForm name="email" type="email" label="Adresse mail :" />
            <InputForm name="password" type="password" label="Mot de passe :" />
            <InputForm
                name="password_confirmation"
                type="password"
                label="Confirmer Mot de passe :"
            />
            <button class="mainButton">Créer un compte</button>
        </form>
    </div>
</template>

<script>
import InputForm from "../InputForm.vue";

export default {
    components: { InputForm },

    methods: {
        async fetchData(e) {
            fetch("/api/signup", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                credentials: "include",
                body: JSON.stringify({
                    name: e.target.name.value,
                    email: e.target.email.value,
                    password: e.target.password.value,
                    password_confirmation: e.target.password_confirmation.value,
                }),
            })
                .then((response) => {
                    if (response.ok) {
                        this.$toast.success("Le compte a bien été créer");

                        this.$router.push("/");
                    } else {
                        this.$toast.error(
                            "Erreur de validation dans le formulaire."
                        );
                    }
                })
                .catch((error) => {
                    this.$toast.error("Adresse Mail deja utilisée");
                });
        },
    },
};
</script>
