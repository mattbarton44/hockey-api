<template>
  <div class="bg-slate-200 flex items-center p-2">
    <div class="w-full"> {{ props.label }}</div>
    <div class="pr-8 w-full"> {{ props.value }}</div>
  </div>
</template>

<script setup>

const props = defineProps(['label', 'value']);


</script>