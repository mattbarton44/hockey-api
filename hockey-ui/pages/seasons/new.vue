<template>
  <div class="max-w-sm space-y-2">
    <div class="font-bold">Create New Season</div> 
    <propRow label="Competition ID" :value="route.params.competitionId" />
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Start Year</div>
      <div class="w-full"><input type="text" v-model="data.startYear" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">End Year</div>
      <div class="w-full"><input type="text" v-model="data.endYear" /></div>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createSeason">
        Create Season
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
const route = useRoute();

const data = ref({
  competition_id: route.params.competitionId,
  startYear: '',
  endYear: '',
})

const createSeason = () => {
  axios.post('http://localhost/api/seasons', data.value)
  .then((response) => {
    console.log(response);
    navigateTo('/competitions/'+ route.params.competitionId)
  })
  .catch((e) => console.log(e))
}


definePageMeta({
  requiresAuth: true,
  alias: [
    '/competitions/:competitionId/seasons/new',
  ],
  label: 'New Season',
})
</script>