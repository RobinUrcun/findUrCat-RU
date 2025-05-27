<template>
    <div class="filterSection">
        <div class="filterWrapper">
            <v-switch v-model="switcher.name" label="Nom :"></v-switch>
            <div v-if="switcher.name" class="filterField">
                <v-text-field label="Nom"></v-text-field>
            </div>
        </div>
        <div class="filterWrapper">
            <v-switch v-model="switcher.isLost" label="Perdu"></v-switch>
            <div v-if="switcher.isLost" class="radioBtn">
                <label for="true">
                    <input id="true" type="radio" name="isLost" />
                    <span class="name">Oui</span>
                </label>
                <label for="false">
                    <input id="false" type="radio" name="isLost" />
                    <span class="name">Non</span>
                </label>
            </div>
        </div>
        <div class="filterWrapper">
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
        <div class="filterWrapper">
            <v-switch v-model="switcher.color" label="Couleur"></v-switch>

            <div v-if="switcher.color" class="filterItem">
                <v-color-picker
                    dot-size="9"
                    mode="rgba"
                    swatches-max-height="100"
                    hide-canvas
                ></v-color-picker>
            </div>
        </div>
    </div>
</template>

<script>
import SearchBar from "../searchBar/SearchBar.vue";
import departementsList from "../../data/departementsList.json";

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
        };
    },
    components: {
        SearchBar,
    },
    methods: {
        changeDepartement() {},
    },
};
</script>
