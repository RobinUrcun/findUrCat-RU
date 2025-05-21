<template>
  <div class="headerLink">
    <router-link :to="href">{{ title }}</router-link>
  </div>
</template>

<script>
export default {
  props: {
    href: String,
    title: String,
  },
};
</script>