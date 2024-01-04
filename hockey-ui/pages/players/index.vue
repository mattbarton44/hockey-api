<template>
  <div class="w-full">
    <div class="mb-4 font-semibold flex justify-between">
      <div>
        List of Players
      </div>
      <div>
        <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="navigateTo(`/players/new`)">
          Create Player
        </button>
      </div>
    </div>
    <div>
      <table class="min-w-full divide-y divide-gray-300">
        <thead>
          <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ID</th>
          <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
          <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date of Birth</th>
        </thead>
        <tbody>
          <tr v-for="row in data" class="hover:bg-slate-100 cursor-pointer" @click="nav(row.id)">
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.id }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.fullName }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ row.date_of_birth }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios'

let data = ref(null);
axios.get('http://localhost/api/players')
.then((response) => {
  data.value = response.data.data;
})
.catch((e) => console.log(e))

const nav = (id) => navigateTo('/players/'+id)


definePageMeta({ requiresAuth: true });
</script>