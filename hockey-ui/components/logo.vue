<template>
  <img :src="source" />
</template>

<script setup>
const props = defineProps({
  sources: {
    type: Array,
    default: [],
  },
});

const source = computed(() => {
	const defaultPath = '/images/default-logo.png';
	return props.sources.reduce((a, c) => (c && a == defaultPath) ? `http://localhost/storage/${c.replace('public/', '' )}` : a, defaultPath);
})


</script>
