<template>
   <div class="min-h-full">
    <navBar />
    <headerBar />
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 overflow-y-auto h-full">
        <!-- Your content -->
        <slot />
      </div>
    </main>
  </div>
</template>

<script setup>
const route = useRoute()

useHead({
  bodyAttrs: {
    class: 'h-full',
  },
  htmlAttrs: {
    class: 'h-full bg-gray-100',
  },
});

</script>