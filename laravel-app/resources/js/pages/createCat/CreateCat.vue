<template>
    <section class="addCatSection">
        <h1>Ajouter un chat</h1>
        <form @submit.prevent="submitForm" class="form">
            <InputForm type="text" name="name" label="Nom du chat :" />
            <InputForm type="color" name="color" label="Couleur :" />
            <InputForm type="text" name="departement" label="Département :" />
            <InputForm
                type="date"
                name="birthday"
                label="Date de naissance :"
            />
            <RadioInput />
            <button class="greyBtn">Ajouter</button>
        </form>
    </section>
</template>

<script>
import InputForm from "../../components/forms/InputForm.vue";
import RadioInput from "../../components/forms/RadioInput.vue";

export default {
    components: {
        InputForm,
        RadioInput,
    },
    methods: {
        async submitForm(e) {
            try {
                const response = await fetch("/api/addCat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({
                        name: e.target.name.value,
                        color: e.target.color.value,
                        departement: e.target.departement.value,
                        birthday: e.target.birthday.value,
                        is_lost: e.target.is_lost.value,
                    }),
                });
                if (response.ok) {
                    this.$toast.success("Le chat a bien été créer");

                    this.$router.push("/");
                } else {
                    this.$taost.error("Impossible de créer un chat");
                }
            } catch (error) {
                this.$taost.error("Impossible de créer un chat");
            }
        },
    },
};
</script>
