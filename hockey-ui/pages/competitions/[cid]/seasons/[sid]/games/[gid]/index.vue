<template>
  <div class="">
    games view {{ route.params.id }}
  </div>
</template>

<script setup>
const route = useRoute();
const { cid, sid, id } = route.params;

definePageMeta({
  requiresAuth: true,
})
</script>