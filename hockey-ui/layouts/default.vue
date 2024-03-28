<template>
  <div class="flex w-full h-screen">
    <navBar />
    <div class="bg-slate-100 w-full h-full flex flex-col flex-1">
      <headerBar />
      <div class="p-4 h-full overflow-y-auto">
        <slot />
      </div>
    </div>
  </div>
  
</template>

<script setup>

</script>