<template>
    <header class="header">
        <img class="logo" src="/assets/images/logo.png" alt="logo" />
        <nav class="header_nav">
            <HeaderLink href="/" title="Accueil" />
            <HeaderLink href="/chatsPerdus" title="Chats perdus" />
            <HeaderLink
                href="/departements"
                title="Recherche par département"
            />
            <HeaderLink href="/connection" title="Se connecter" />
            <HeaderLink href="/creer_un_compte" title="Créer un compte" />
            <HeaderLink href="/ajouter_un_chat" title="Ajouter un chat" />
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
