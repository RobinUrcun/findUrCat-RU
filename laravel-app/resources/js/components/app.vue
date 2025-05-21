<template>
  <div>
    <Layout />
    <router-view />
  </div>
</template>

<script>
import Layout from "../layouts/Layout.vue";

export default {
  name: "App",
  components: {
    Layout,
  },
};
</script>
