<template>
  <div class="w-full">
    <label class="block text-sm font-medium leading-6 text-gray-900">{{ props.label }}</label>
    <div class="mt-1 flex">
      <slot />
    </div>
  </div>
</template>

<script setup>

const props = defineProps({
  label: String,
})

</script>