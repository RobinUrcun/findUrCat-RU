<template>
  <div class="searchCatWrapper">
    <CatCard
      v-for="cat in catList"
      :name="cat.name"
      :color="cat.color"
      :departement="cat.departement"
      :proprietaire="cat.user.name"
      :key="cat.id"
    />
  </div>
</template>

<script>
import CatCard from "../cards/CatCard.vue";

export default {
  components: {
    CatCard,
  },
  props: {
    catList: Array,
  },
};
</script>

