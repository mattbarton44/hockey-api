<template>

  <div class="w-full" v-if="data">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <div class="flex space-x-8">
        <div class="">
          <logo class="w-20 h-20" :sources="[data.logoUrl]" />
        </div>
        <div class="my-auto">
          <h3 class="text-3xl font-semibold leading-6 text-gray-900">{{ data.name }}</h3>
          <div class="mt-1 text-sm text-gray-500">{{ data.description }}</div>
        </div>
      </div>
      <div class="mt-3 sm:ml-4 sm:mt-0">
        <button type="button" @click="navigateTo(`/competitions/${cid}/edit`)" class="inline-flex items-center rounded-md bg-great-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-great-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-great-blue-600">
          Edit Competition
        </button>
      </div>
    </div>
    <div class="w-full grid grid-cols-2 mt-6 gap-8">
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
          <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
            <div class="ml-4 mt-2">
              <h3 class="text-base font-semibold leading-6 text-gray-900">Seasons</h3>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0">
              <button type="button" @click="navigateTo(`/competitions/${data.id}/seasons/new`)" class="relative inline-flex items-center rounded-md bg-great-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-great-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-great-blue-600">
                Create new season
              </button>
            </div>
          </div>
        </div>
        <div class="">
          <div class="inline-block min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-300 bg-slate-100">
              <thead class="text-left text-sm font-semibold text-gray-900">
                <tr>
                  <th class="p-4">Name</th>
                  <th class="p-4">Start Date</th>
                  <th class="p-4">End Date</th>
                  <th class="p-4">Teams</th>
                  <th class="p-4">Games</th>
                  <th class="p-4 w-8"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr v-for="row in data.seasons" class="hover:bg-gray-50 cursor-pointer text-sm text-gray-500" @click="navigateTo(`/competitions/${cid}/seasons/${row.id}`)">
                  <td class="whitespace-nowrap p-4 text-gray-900">{{ row.name }}</td>
                  <td class="whitespace-nowrap p-4">{{ row.startDate }}</td>
                  <td class="whitespace-nowrap p-4">{{ row.endDate }}</td>
                  <td class="p-4">{{ row.rosters.length }}</td>
                  <td class="p-4">{{ row.games.length }}</td>
                  <td class="p-4">
                    <ChevronRightIcon class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ChevronRightIcon } from '@heroicons/vue/20/solid';
import axios from 'axios'

const route = useRoute();
const { cid } = route.params;

let data = ref(null);
axios.get(`http://localhost/api/competitions/${cid}`)
.then((response) => {
  data.value = response.data.data;
})
.catch((e) => console.log(e))

const rowProps = ['id', 'name', 'description'];

const tabs = [
  { name: 'Applied', href: '#', current: false },
  { name: 'Phone Screening', href: '#', current: false },
  { name: 'Interview', href: '#', current: true },
  { name: 'Offer', href: '#', current: false },
  { name: 'Hired', href: '#', current: false },
]

const people = [
  { name: 'Lindsay Walton', title: 'Front-end Developer', email: 'lindsay.walton@example.com', role: 'Member' },
  // More people...
]


definePageMeta({ requiresAuth: true });
</script>