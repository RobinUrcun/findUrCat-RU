<template>
    <header class="header">
        <img class="logo" src="/assets/images/logo.png" alt="logo" />
        <nav class="header_nav">
            <HeaderLink href="/" title="Accueil" />
            <HeaderLink href="/ChatsPerdus" title="Chats perdus" />
            <HeaderLink
                href="/Départements"
                title="Recherche par département"
            />
            <HeaderLink href="/connection" title="Se connecter" />
        </nav>
    </header>
</template>

<script>
import HeaderLink from "./HeaderLink.vue";

export default {
    components: {
        HeaderLink,
    },
};
</script>
