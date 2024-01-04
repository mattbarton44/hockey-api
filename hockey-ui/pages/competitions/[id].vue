<template>
  <div class="w-full flex space-x-4 flex-grow" v-if="data">
    <div class="space-y-2 w-full">
      <propRow v-for="prop in rowProps" :label="prop" :value="data[prop]" />
      <div><img :src="data.logoUrl || '/images/default-logo.png'" class="w-20 h-20"/></div>
    </div>
    <div class="bg-slate-200 p-4 w-full">
      <div class="mb-4 font-semibold flex justify-between">
        <div>
          List of Seasons
        </div>
        <div>
          <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="navigateTo(`/competitions/${data.id}/seasons/new`)">
            Create Season
          </button>
        </div>
      </div>
      <div>
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Start Date</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">End Date</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"># of Teams</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"># of Games</th>
          </thead>
          <tbody>
            <tr v-for="row in data.seasons" class="hover:bg-slate-100 cursor-pointer" @click="navigateTo(`/seasons/${row.id}`)">
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.name }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.startDate }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.endDate }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.rosters.length }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.games.length }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios'

const route = useRoute()
const id = route.params

let data = ref(null);
axios.get(`http://localhost/api/competitions/${route.params.id}`)
.then((response) => {
  data.value = response.data.data;
})
.catch((e) => console.log(e))

const rowProps = ['id', 'name', 'description'];

definePageMeta({
  requiresAuth: true,
})
</script>