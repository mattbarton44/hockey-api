<template>
  <div class="w-full">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <h3 class="text-lg font-semibold leading-6 text-gray-900">Competitions</h3>
      <div class="mt-3 sm:ml-4 sm:mt-0">
        <button type="button" @click="navigateTo(`/competitions/new`)" class="inline-flex items-center rounded-md bg-great-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-great-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-great-blue-600">Create new competition</button>
      </div>
    </div>
    <ul role="list" class="mt-6 divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
      <li v-for="row in data" :key="row.id" class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6 cursor-pointer" @click="navigateTo('/competitions/'+row.id)">
        <div class="flex min-w-0 gap-x-4">
          <img class="h-12 w-12 flex-none bg-gray-50" :src="row.logoUrl" alt="" />
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
import axios from 'axios';
import { ChevronRightIcon } from '@heroicons/vue/20/solid';

let data = ref(null);
axios.get('http://localhost/api/competitions')
.then((response) => {
  data.value = response.data.data;
})
.catch((e) => console.log(e))

definePageMeta({ requiresAuth: true, name: 'Competitions' });
</script>