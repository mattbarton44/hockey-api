<template>
  <div class="w-full">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <h3 class="text-lg font-semibold leading-6 text-gray-900">Competitions</h3>
      <div class="mt-3 sm:ml-4 sm:mt-0">
        <button-nav @click="navigateTo(`/competitions/new`)">Create new competition</button-nav>
      </div>
    </div>
    <ul role="list" class="mt-6 divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
      <li v-for="row in data" :key="row.id" class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6 cursor-pointer" @click="navigateTo('/competitions/'+row.id)">
        <div class="flex min-w-0 gap-x-4">
          <ui-logo class="h-12 w-12" :sources="[row.logoUrl]" />
          <div class="min-w-0 flex-auto">
            <p class="text-sm font-semibold leading-6 text-gray-900">
              <a>
                <span class="absolute inset-x-0 -top-px bottom-0" />
                {{ row.name }}
              </a>
            </p>
            <p class="mt-1 flex text-xs leading-5 text-gray-500">
              {{ row.description }}
            </p>
          </div>
        </div>
        <div class="flex shrink-0 items-center gap-x-4">
          <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">text</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">
              Last seen dfzg
            </p>
          </div>
          <ChevronRightIcon class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ChevronRightIcon } from '@heroicons/vue/20/solid';

let data = ref(null);

api.competitions.index((response) => data.value = response);

definePageMeta({ requiresAuth: true, name: 'Competitions' });
</script>