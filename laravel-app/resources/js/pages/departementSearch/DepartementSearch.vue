<template>
    <section class="departementSearchSection">
        <h1>Rechercher par departement</h1>
        <SearchBar />
        <select name="search" id="search">
            <option
                :value="departement.code"
                v-for="departement in departements"
            >
                {{ departement.nom }}
            </option>
        </select>
        <v-combobox
            label="Combobox"
            :items="[
                'California',
                'Colorado',
                'Florida',
                'Georgia',
                'Texas',
                'Wyoming',
            ]"
        ></v-combobox>
    </section>
</template>

<script>
import SearchBar from "../../components/searchBar/SearchBar.vue";
import departementsList from "../../data/departementsList.json";

export default {
    components: {
        SearchBar,
    },
    data() {
        return {
            departements: departementsList,
        };
    },
};
</script>
