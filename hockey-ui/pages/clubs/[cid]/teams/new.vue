<template>


<div class="w-full">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <h3 class="text-lg font-semibold leading-6 text-gray-900 py-2">Create New Team</h3>
    </div>
    <div class="w-full grid grid-cols-2 mt-6 gap-8">
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="space-y-4 p-8">

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Club</label>
            <div class="mt-2">
              <span class="">{{parentData.name}}</span>
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Team Name</label>
            <div class="mt-2">
              <input type="text" v-model="data.name" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nickname</label>
            <div class="mt-2">
              <input type="text" v-model="data.nickname" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="col-span-full">
            <label class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
              <textarea rows="3" v-model="data.description" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Logo</label>
            <div class="mt-2">
              <input @change="onFilePicked" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" id="file_input" type="file" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Venue Name</label>
            <div class="mt-2">
              <input type="text" v-model="data.venueName" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Venue Address</label>
            <div class="mt-2">
              <input type="text" v-model="data.venueAddress" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Primary Colour</label>
            <div class="mt-2">
              <input type="color" v-model="data.primaryColour" class="p-0.5 h-12 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Secondary Colour</label>
            <div class="mt-2">
              <input type="color" v-model="data.secondaryColour" class="p-0.5 h-12 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>
        </div>
        
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4">
          <button-action @click="createModel">Create Team</button-action>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
const route = useRoute();
const { cid } = route.params;

const parentData = ref({});

const data = ref({
  club_id: cid,
  name: '',
  nickname: null,
  description: null,
  logoUrl: null,
  logo: null,
  venueName: null,
  venueAddress: null,
  primaryColour: null,
  secondaryColour: null,
})

api.clubs.show(cid, (d) => {
  parentData.value = d;
  data.value = { ...data.value, ...d };
});

const createModel = () => {
  api.teams.store(data.value, () => navigateTo(`/clubs/${cid}`));
}

const onFilePicked = (event) => {
  const files = event.target.files;
  data.value.logo = files[0];
}


definePageMeta({ requiresAuth: true });
</script>