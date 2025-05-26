<template>
  <section class="departementSearchSection">
    <h1>Rechercher par departement</h1>
    <SearchBar
      @selectedDepartement="changeDepartement"
      :departements="departements"
    />
    <DisplayView :catList="catList" />
  </section>
</template>

<script>
import SearchBar from "../../components/searchBar/SearchBar.vue";
import departementsList from "../../data/departementsList.json";
import DisplayView from "../../components/DisplayView/DisplayView.vue";

export default {
  components: {
    SearchBar,
    DisplayView,
  },
  data() {
    return {
      departements: departementsList,
      catList: [],
      filterDepartement: "01",
    };
  },
  methods: {
    async fetchData() {
      try {
        console.log("toto");

        const response = await fetch(
          `/api/getAllCats/${this.filterDepartement}`,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
              Accept: "application/json",
            },
          }
        );
        if (response.ok) {
          const data = await response.json();

          this.catList = data.catList;
          console.log(this.catList);
        } else {
          this.$toast.error("Impossible de charger la liste");
        }
      } catch (error) {
        this.$toast.error("Impossible de charger la liste");
      }
    },
    changeDepartement(payload) {
      console.log(payload);

      this.filterDepartement = payload;

      this.fetchData();
    },
  },
  mounted() {
    this.fetchData();
  },
};
</script>
