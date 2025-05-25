<template>
    <section class="lostCatSection">
        <h1>Chats perdus</h1>
        <div class="lostCatWrapper">
            <CatCard
                v-for="cat in catList"
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
import CatCard from "../../components/cards/CatCard.vue";

export default {
    components: {
        CatCard,
    },
    data() {
        return {
            catList: [],
        };
    },
    async mounted() {
        const response = await fetch("/api/getAllCats", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        });

        if (response.ok) {
            const result = await response.json();

            this.catList = result;
        } else {
        }
    },
};
</script>
