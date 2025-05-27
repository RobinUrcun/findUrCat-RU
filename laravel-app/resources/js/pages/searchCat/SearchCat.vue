<template>
  <section class="searchCatSection">
    <h1>Rechercher un chat</h1>
    <SearchCatBar />
    <SearchCatView />
  </section>
</template>
<script>
import SearchCatBar from "../../components/searchCatBar/SearchCatBar.vue";
import SearchCatView from "../../components/searchCatView/SearchCatView.vue";
export default {
  components: {
    SearchCatBar,
    SearchCatView,
  },
};
</script>