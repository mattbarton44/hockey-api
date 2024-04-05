<template>
  <div class="w-full flex space-x-4 flex-grow" v-if="data">
    <div class="space-y-2 w-full">
      <propRow v-for="prop in rowProps" :label="prop" :value="data[prop]" />
      <div class="bg-slate-200 flex items-center p-2">
        <div class="w-full">primaryColour</div>
        <div class="pr-8 w-full">
          <div class="h-8 w-12" :style="`background:${data.primaryColour}`" v-if="data.primaryColour !== null"></div>
        </div>
      </div>
      <div class="bg-slate-200 flex items-center p-2">
        <div class="w-full">secondaryColour</div>
        <div class="pr-8 w-full">
          <div class="h-8 w-12" :style="`background:${data.secondaryColour}`" v-if="data.secondaryColour !== null"></div>
        </div>
      </div>
      <div><img :src="data.logoUrl || '/images/default-logo.png'" class="w-20 h-20"/></div>
    </div>
    <div class="bg-slate-200 p-4 w-full">
      <div class="mb-4 font-semibold flex justify-between">
        <div>
          List of Teams
        </div>
        <div>
          <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="navigateTo(`/clubs/${cid}/teams/new`)">
            Create Team
          </button>
        </div>
      </div>
      <div>
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nickname</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Logo</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Venue</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Primary Colour</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Secondary Colour</th>
            <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"># of Rosters</th>
          </thead>
          <tbody>
            <tr v-for="row in data.teams" class="hover:bg-slate-100 cursor-pointer" @click="navigateTo(`/clubs/${cid}/teams/${row.id}`)">
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.name }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.nickname }}</td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <img :src="row.logoUrl || '/images/default-logo.png'" class="w-12 h-12"/>
              </td>
              <td class="px-3 py-4 text-sm text-gray-500"><div>{{ row.venueName }}</div><div>{{ row.venueAddress }}</div></td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="h-8 w-12" :style="`background:${row.primaryColour}`" v-if="row.primaryColour !== null"></div>
              </td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="h-8 w-12" :style="`background:${row.secondaryColour}`" v-if="row.secondaryColour !== null"></div>
              </td>
              <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.rosters.length }}</td>
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
const { cid } = route.params

let data = ref(null);
axios.get(`http://localhost/api/clubs/${cid}`)
.then((response) => {
  data.value = response.data.data;
})
.catch((e) => console.log(e))

const rowProps = ['id', 'name', 'nickname', 'description', 'venueName', 'venueAddress'];

definePageMeta({ requiresAuth: true });
</script>