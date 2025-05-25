<template>
    <div class="catCard">
        <img src="/assets/images/cardCatExemple.jpg" alt="exemple" />

        <div class="asideCard">
            <h3>
                {{ name }}
            </h3>
            <p>Couleur : {{ color }}</p>
            <p>Département : {{ departement }}</p>
            <p>Proprietaire : {{ proprietaire }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        color: String,
        departement: Number,
        proprietaire: String,
    },
};
</script>
