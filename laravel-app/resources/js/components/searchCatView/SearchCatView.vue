<template>
  <div class="SearchCatView">
    <CatCard
      v-for="cat in getCatFilterList"
      :key="cat.id"
      :name="cat.name"
      :color="cat.color"
      :departement="cat.departement"
      :proprietaire="cat.user.name"
    />
  </div>
</template>

<script>
import CatCard from "../cards/CatCard.vue";
import { mapGetters } from "vuex";
export default {
  components: { CatCard },
  computed: {
    ...mapGetters(["getCatFilterList"]),
  },
};
</script>