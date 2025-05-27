<template>
    <header class="header">
        <img class="logo" src="/assets/images/logo.png" alt="logo" />
        <nav class="header_nav">
            <HeaderLink href="/" title="Accueil" />

            <v-menu offset-y>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        elevation="0"
                        color="transparent"
                        dark
                        v-bind="attrs"
                        v-on="on"
                    >
                        Recherche
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item
                        v-for="(link, index) in searchLinks"
                        :key="index"
                    >
                        <v-list-item-title
                            ><a :href="link.href">{{
                                link.title
                            }}</a></v-list-item-title
                        >
                    </v-list-item>
                </v-list>
            </v-menu>

            <HeaderLink href="/ajouter_un_chat" title="Ajouter un chat" />
            <v-menu v-if="getIsUserLog" offset-y>
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        elevation="0"
                        color="transparent"
                        dark
                        v-bind="attrs"
                        v-on="on"
                    >
                        Connection
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item
                        v-for="(link, index) in authLinks"
                        :key="index"
                    >
                        <v-list-item-title
                            ><a :href="link.href">{{
                                link.title
                            }}</a></v-list-item-title
                        >
                    </v-list-item>
                </v-list>
            </v-menu>

            <div v-if="!getIsUserLog">Bonjour : {{ getUserName }}</div>
            <div v-if="!getIsUserLog" @click="logoutClient" class="logout">
                <img src="/assets/images/logoutLogo.png" alt="Se deconnecter" />
            </div>
        </nav>
    </header>
</template>

<script>
import HeaderLink from "./HeaderLink.vue";
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            searchLinks: [
                { title: "Chats perdus", href: "/chatsPerdus" },
                { title: "Rechercher un chat", href: "/rechercher_un_chat" },
                {
                    title: "Rechercher par département",
                    href: "/departements",
                },
            ],
            authLinks: [
                { title: "Se connecter", href: "/connection" },
                { title: "Créer un compte", href: "/creer_un_compte" },
            ],
        };
    },
    components: {
        HeaderLink,
    },
    computed: {
        ...mapGetters(["getIsUserLog", "getUserName"]),
    },
    methods: {
        ...mapActions(["logout"]),

        async logoutClient() {
            try {
                const isLogout = await this.logout();
                if (isLogout.status === 200) {
                    this.$toast.success("Déconnection");
                } else {
                    this.$toast.error("Déconnection impossible");
                }
            } catch (error) {
                this.$toast.error("Déconnection impossible");
            }
        },
    },
};
</script>
