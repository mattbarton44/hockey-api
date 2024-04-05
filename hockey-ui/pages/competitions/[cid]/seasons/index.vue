<template>
  <div class="">
    seasons index {{ route.params.id }}
  </div>
</template>

<script setup>
const route = useRoute();

definePageMeta({
  requiresAuth: true,
})
</script>