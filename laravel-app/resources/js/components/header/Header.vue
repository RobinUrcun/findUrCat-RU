<template>
  <header class="header">
    <img class="logo" src="/assets/images/logo.png" alt="logo" />
    <nav class="header_nav">
      <HeaderLink href="/" title="Accueil" />
      <HeaderLink href="/chatsPerdus" title="Chats perdus" />
      <HeaderLink href="/rechercher_un_chat" title="Rechercher un chat" />

      <HeaderLink href="/departements" title="Recherche par département" />
      <HeaderLink href="/ajouter_un_chat" title="Ajouter un chat" />

      <HeaderLink v-if="getIsUserLog" href="/connection" title="Se connecter" />
      <HeaderLink
        v-if="getIsUserLog"
        href="/creer_un_compte"
        title="Créer un compte"
      />
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
