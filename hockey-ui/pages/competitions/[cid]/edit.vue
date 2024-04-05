<template>
  <div class="">
    seasons edit {{ route.params.id }}
  </div>
</template>

<script setup>
const route = useRoute();

definePageMeta({
  requiresAuth: true,
})
</script>