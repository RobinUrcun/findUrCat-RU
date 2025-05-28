<template>
  <div class="d-flex flex-column">
    <div class="filterSection d-flex flex-row justify-space-around">
      <div class="filterWrapper d-flex flex-column align-center">
        <v-switch v-model="switcher.name" label="Nom :"></v-switch>
        <div v-if="switcher.name" class="filterField">
          <v-text-field label="Nom" v-model="inputContent.name"></v-text-field>
        </div>
      </div>
      <div class="filterWrapper d-flex flex-column align-center">
        <v-switch v-model="switcher.isLost" label="Perdu"></v-switch>
        <div v-if="switcher.isLost" class="radioBtn">
          <label for="true">
            <input
              id="true"
              type="radio"
              name="isLost"
              value="1"
              v-model="inputContent.isLost"
            />
            <span class="name">Oui</span>
          </label>
          <label for="false">
            <input
              id="false"
              type="radio"
              name="isLost"
              value="0"
              v-model="inputContent.isLost"
            />
            <span class="name">Non</span>
          </label>
        </div>
      </div>
      <div class="filterWrapper d-flex flex-column align-center">
        <v-switch
          v-model="switcher.departement"
          label="Départements"
        ></v-switch>

        <div v-if="switcher.departement" class="filterItem">
          <SearchBar
            @selectedDepartement="changeDepartement"
            :departements="departements"
          />
        </div>
      </div>
      <div class="filterWrapper d-flex flex-column align-center">
        <v-switch v-model="switcher.color" label="Couleur"></v-switch>

        <div v-if="switcher.color" class="filterItem">
          <v-color-picker
            dot-size="9"
            hide-mode-switch
            hide-sliders
            mode="hexa"
            swatches-max-height="200"
            v-model="inputContent.color"
          ></v-color-picker>
        </div>
      </div>
    </div>
    <button @click="fetchDataWithParams" class="mainButton">Rechercher</button>
  </div>
</template>

<script>
import SearchBar from "../searchBar/SearchBar.vue";
import departementsList from "../../data/departementsList.json";
import { mapActions } from "vuex";

export default {
  data() {
    return {
      switcher: {
        name: false,
        isLost: false,
        departement: false,
        color: false,
      },
      departements: departementsList,
      inputContent: {
        name: null,
        isLost: null,
        departement: null,
        color: null,
      },
    };
  },
  components: {
    SearchBar,
  },
  methods: {
    changeDepartement(selectedDepartement) {
      this.inputContent.departement = selectedDepartement;
    },

    ...mapActions(["fetchCatWithFilter"]),

    async fetchDataWithParams() {
      console.log(this.inputContent.isLost);
      const response = await this.fetchCatWithFilter({
        name: this.inputContent.name,
        isLost: this.inputContent.isLost,
        departement: this.inputContent.departement,
        color: this.inputContent.color,
      });

      if (response.ok) {
        const data = await response.json();
        console.log(data);
      }

      try {
      } catch (error) {}
    },
  },
  watch: {
    "switcher.name": function (value) {
      if (!value) {
        this.inputContent.name = null;
      }
    },
    "switcher.isLost": function (value) {
      if (!value) {
        this.inputContent.isLost = null;
      }
    },
    "switcher.departement": function (value) {
      if (!value) {
        this.inputContent.departement = null;
      }
    },
    "switcher.color": function (value) {
      if (!value) {
        this.inputContent.color = null;
      }
    },
    "inputContent.color": function (value) {
      console.log(value);

      if (value.hex) {
        console.log(value.hex);

        this.inputContent.color = value.hex;
      }
    },
  },
};
</script>
