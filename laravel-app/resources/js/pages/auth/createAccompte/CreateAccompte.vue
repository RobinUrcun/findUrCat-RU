<template>
  <section class="createAcccompteSection">
    <h1>Creer un compte</h1>
    <CreateAccompteForm />
  </section>
</template>

<script>
import CreateAccompteForm from "../../../components/forms/createAccompteForm/CreateAccompteForm.vue";

export default {
  components: {
    CreateAccompteForm,
  },
};
</script>