<template>
  <div class="inputForm">
    <label :for="name">{{ label }}</label>
    <input :type="type" :name="name" :id="name" />
  </div>
</template>

<script>
export default {
  props: {
    label: String,
    type: String,
    name: String,
  },
};
</script>