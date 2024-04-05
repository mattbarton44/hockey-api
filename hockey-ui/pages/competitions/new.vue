<template>
  <div class="max-w-sm space-y-2">
    <div class="font-bold">Create New Competition</div> 
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Name</div>
      <div class="w-full"><input type="text" v-model="data.name" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Description</div>
      <div class="w-full"><input type="text" v-model="data.description" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">LogoUrl</div>
      <div class="w-full"><input type="text" v-model="data.logoUrl" /></div>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createModel">
        Create Competition
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';

const data = ref({
  name: '',
  description: '',
  logoUrl: '',
})

const createModel = () => {
  axios.post('http://localhost/api/competitions', data.value)
  .then((response) => {
    console.log(response);
    navigateTo('/competitions/')
  })
  .catch((e) => console.log(e))
}


definePageMeta({ requiresAuth: true, name: 'New Competition' })
</script>