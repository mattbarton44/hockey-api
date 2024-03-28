<template>
  <div class="max-w-xl space-y-4">
    <div class="font-bold">Create New Team</div> 
    <propRow label="Club ID" :value="route.params.clubId" />
    <stackedInput label="Name">
      <input type="text" v-model="data.name" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Nickname">
      <input type="text" v-model="data.nickname" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Description">
      <textarea type="text" v-model="data.description" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Logo Url">
      <input type="text" v-model="data.logoUrl" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Venue Name">
      <input type="text" v-model="data.venueName" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Venue Address">
      <input type="text" v-model="data.venueAddress" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <div class="flex space-x-4 w-full">
      <stackedInput label="Primary Colour">
        <input type="color" v-model="data.primaryColour" class="w-full border h-12 px-0.5">
      </stackedInput>
      <stackedInput label="Secondary Colour">
        <input type="color" v-model="data.secondaryColour" class="w-full border h-12 px-0.5">
      </stackedInput>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createModel">
        Create Team
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
const route = useRoute();

const parentData = ref({});

const data = ref({
  club_id: route.params.clubId,
  name: '',
  nickname: null,
  description: null,
  logoUrl: null,
  venueName: null,
  venueAddress: null,
  primaryColour: null,
  secondaryColour: null,
})

axios.get(`http://localhost/api/clubs/${route.params.clubId}`)
.then((response) => {
  parentData.value = response.data.data;
  data.value.name = parentData.value.name;
  data.value.nickname = parentData.value.nickname;
  data.value.description = parentData.value.description;
  data.value.logoUrl = parentData.value.logoUrl;
  data.value.venueName = parentData.value.venueName;
  data.value.venueAddress = parentData.value.venueAddress;
  data.value.primaryColour = parentData.value.primaryColour;
  data.value.secondaryColour = parentData.value.secondaryColour;
}).catch((e) => console.log(e))

const createModel = () => {
  axios.post('http://localhost/api/teams', data.value)
  .then((response) => {
    console.log(response);
    navigateTo('/clubs/'+ route.params.clubId)
  })
  .catch((e) => console.log(e))
}

definePageMeta({
  requiresAuth: true,
  alias: [
    '/clubs/:clubId/teams/new',
  ],
  label: 'New Team',
})
</script>