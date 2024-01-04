<template>
  <div class="max-w-sm space-y-2">
    <div class="font-bold">Create New Player</div> 
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Full Name</div>
      <div class="w-full"><input type="text" v-model="data.fullName" /></div>
    </div>
    <div class="bg-slate-100 flex items-center p-2">
      <div class="w-full">Date of Birth</div>
      <div class="w-full"><input type="text" v-model="data.date_of_birth" /></div>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createModel">
        Create Player
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
const route = useRoute();

const data = ref({
  fullName: '',
  date_of_birth: '',
})

const createModel = () => {
  axios.post('http://localhost/api/players', data.value)
  .then((response) => {
    console.log(response);
    navigateTo('/players/')
  })
  .catch((e) => console.log(e))
}


definePageMeta({
  requiresAuth: true,
})
</script>