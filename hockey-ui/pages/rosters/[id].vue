<template>
  <div class="">
    rosters {{ route.params.id }}
  </div>
</template>

<script setup>
const route = useRoute();

definePageMeta({
  requiresAuth: true,
})
</script>