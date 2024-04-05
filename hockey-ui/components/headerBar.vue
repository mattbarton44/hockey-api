<template>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
      <div>
        <nav class="sm:hidden" aria-label="Back">
          <a href="#" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
            <ChevronLeftIcon class="-ml-1 mr-1 h-5 w-5 flex-shrink-0 text-gray-400" aria-hidden="true" />
            Back
          </a>
        </nav>
        <nav class="hidden sm:flex" aria-label="Breadcrumb">
          <ol role="list" class="flex items-center space-x-4 uppercase">
            <li v-for="crumb, i in breadcrumbs" :key="crumb.path">
              <NuxtLink :to="crumb.path" v-if="i === 0" class="flex">
                <a href="#" class="text-xs font-semibold text-gray-500 hover:text-gray-700">
                  {{ crumb.label }}
                </a>
              </NuxtLink>
              <NuxtLink :to="crumb.path" v-else class="flex items-center">
                <ChevronRightIcon class="h-5 w-5 flex-shrink-0 text-gray-400 font-semibold" aria-hidden="true" />
                <a href="#" class="ml-4 text-xs font-semibold text-gray-500 hover:text-gray-700">
                  {{ crumb.label }}
                </a>
              </NuxtLink>
            </li>
          </ol>
        </nav>
      </div>
      <div class="mt-2 md:flex md:items-center md:justify-between" v-if="false">
        <div class="min-w-0 flex-1">
          <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ route.name }}</h2>
        </div>
        <div class="mt-4 flex flex-shrink-0 md:ml-4 md:mt-0">
        </div>
      </div>
    </div>
  </header>
  
</template>

<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

const route = useRoute();
console.log(route);

const breadcrumbs = computed(() => {
  const parts = route.path.split("/").filter((r) => r !== '');
  return [ { label: 'Home', path: '/' }, ...parts.map((r, i) => ({ label: r, path: `/${parts.slice(0, i+1).join('/')}` }))];
});
</script>