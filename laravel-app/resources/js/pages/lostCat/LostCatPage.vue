<template>
  <section class="lostCatSection">
    <h1>Chats perdus</h1>
    <div class="lostCatWrapper">
      <CatCard
        v-for="cat in getCatList"
        :name="cat.name"
        :color="cat.color"
        :departement="cat.departement"
        :key="cat.id"
        :proprietaire="cat.user.name"
      />
    </div>
  </section>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import CatCard from "../../components/cards/CatCard.vue";

export default {
  components: {
    CatCard,
  },
  computed: {
    ...mapGetters(["getCatList"]),
  },
  methods: {
    ...mapActions(["fetchCatList"]),
  },

  mounted() {
    this.fetchCatList();
  },
};
</script>
