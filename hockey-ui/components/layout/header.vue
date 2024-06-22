<template>
  <header class="bg-white shadow h-14">
    <div v-cloak class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex items-center align-middle h-full">
      <div>
        <nav class="sm:hidden" aria-label="Back">
          <a href="#" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
            <ChevronLeftIcon class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
            Back
          </a>
        </nav>
        <nav class="hidden sm:flex" aria-label="Breadcrumb">
          <ol role="list" class="flex items-center space-x-4 uppercase">
            <li v-for="crumb, i in breadcrumbs" :key="crumb.path" class="h-14 flex items-center">
              <NuxtLink :to="crumb.path" class="flex items-center">
                <ChevronRightIcon class="h-5 w-5 flex-shrink-0 text-gray-400 font-semibold" aria-hidden="true" v-if="i !== 0"  />
                <div href="#" class="ml-4 text-xs font-semibold text-gray-500 hover:text-gray-700">
                  {{ crumb.label }}
                </div>
              </NuxtLink>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </header>
  
</template>

<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

const route = useRoute();

const breadcrumbs = computed(() => {
  const parts = route.path.split("/").filter((r) => r !== '');
  return [ { label: 'Home', path: '/' }, ...parts.map((r, i) => ({ label: r, path: `/${parts.slice(0, i+1).join('/')}` }))];
});
</script>