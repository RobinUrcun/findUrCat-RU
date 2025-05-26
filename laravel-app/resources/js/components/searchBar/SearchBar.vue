<template>
  <div class="searchBar">
    <v-flex align-self-center="true">
      <v-select
        v-model="selected"
        :items="departements"
        :item-text="formatDepartement"
        item-value="code"
        label="Choisissez un département"
        single-line
        dense
        solo
      ></v-select>

      <p>Valeur sélectionnée : {{ selected }}</p>
    </v-flex>
  </div>
</template>
<script>
export default {
  props: {
    departements: Array,
  },
  methods: {
    onChange(e) {
      this.$emit("selectedDepartement", e.target.value);
    },
    formatDepartement(departement) {
      return `${departement.code} - ${departement.nom}`;
    },
  },
  data() {
    return {
      selected: "",
    };
  },
  watch: {
    selected: function (code) {
      this.$emit("selectedDepartement", code);
    },
  },
};
</script>
