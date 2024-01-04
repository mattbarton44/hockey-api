<template>
  <div class="max-w-sm space-y-2">
    <div class="font-bold">Create New Club</div> 
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Name</div>
      <div class="w-full"><input type="text" v-model="data.name" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Nickname</div>
      <div class="w-full"><input type="text" v-model="data.nickname" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Description</div>
      <div class="w-full"><input type="text" v-model="data.description" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">LogoUrl</div>
      <div class="w-full"><input type="text" v-model="data.logoUrl" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Venue Name</div>
      <div class="w-full"><input type="text" v-model="data.venueName" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Venue Address</div>
      <div class="w-full"><input type="text" v-model="data.venueAddress" /></div>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createModel">
        Create Club
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';

const data = ref({
  name: '',
  nickname: '',
  description: '',
  logoUrl: '',
  venueName: '',
  venueAddress: '',
})

const createModel = () => {
  axios.post('http://localhost/api/clubs', data.value)
  .then((response) => {
    console.log(response);
    navigateTo('/clubs/')
  })
  .catch((e) => console.log(e))
}


definePageMeta({
  requiresAuth: true,
})
</script>