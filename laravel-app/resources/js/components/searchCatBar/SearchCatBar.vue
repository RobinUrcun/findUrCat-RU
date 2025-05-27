<template>
  <section>
    <v-switch label="Nom :"></v-switch>

    <div class="filterItem">
      <v-text-field label="Nom :"></v-text-field>
    </div>
    <div class="filterItem">
      <v-switch label="Perdu ?"></v-switch>
    </div>
    <div class="filterItem">
      <v-color-picker
        dot-size="9"
        mode="rgba"
        swatches-max-height="100"
        hide-canvas
      ></v-color-picker>
    </div>
  </section>
</template>

<script>
export default {};
</script>