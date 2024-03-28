<template>
  <div class="max-w-xl space-y-4">
    <div class="font-bold">Create New Season</div> 
    <propRow label="Competition ID" :value="route.params.competitionId" />
    <stackedInput label="Name">
      <input type="text" v-model="data.name" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Start Date">
      <input type="text" v-model="data.startDate" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="End Date">
      <input type="text" v-model="data.endDate" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
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

const parentData = ref({});

const data = ref({
  competition_id: route.params.competitionId,
  name: '',
  startDate: '',
  endDate: '',
});


axios.get(`http://localhost/api/competitions/${route.params.competitionId}`)
.then((response) => {
  parentData.value = response.data.data;
  data.value.name = parentData.value.name;
}).catch((e) => console.log(e));

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