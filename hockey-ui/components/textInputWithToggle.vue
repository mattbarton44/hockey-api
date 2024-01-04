<template>
  <div type="button" class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-l-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
    <div>{{ props.toggleLabel }}</div>
    <input type="checkbox" class="" @change="onToggle" v-model="data.toggle">
  </div>
  <div class="relative flex flex-grow items-stretch focus-within:z-10">
    <input type="text" :placeholder="props.placeholder" :disabled="data.toggle" v-model="data.localValue" class="block w-full rounded-none rounded-r-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
  </div>
</template>

<script setup>

const props = defineProps({
  placeholder: String,
  toggleLabel: {
    default: 'Inherit from Club',
    type: String
  },
  value: String,
})

const data = ref({
  toggle: true,
  localValue: props.value,
})

const onToggle = (val) => {
  if(val) {
    data.value.localValue = props.value; 
  } 
}

</script>