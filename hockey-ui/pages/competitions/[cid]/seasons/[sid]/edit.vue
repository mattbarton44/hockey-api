<template>
  <div class="w-full" v-if="loaded">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <h3 class="text-lg font-semibold leading-6 text-gray-900 py-2">Edit Season</h3>
    </div>
    <div class="w-full grid grid-cols-2 mt-6 gap-8">
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="space-y-4 p-8">

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Competition</label>
            <div class="mt-2">
              <span class="">{{parentData.name}}</span>
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Season Name</label>
            <div class="mt-2">
              <input type="text" v-model="data.name" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Start Date</label>
            <div class="mt-2">
              <input type="date" v-model="data.startDate" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
            <div class="mt-2">
              <input type="date" v-model="data.endDate" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>
        </div>

        
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4">
          <button-action @click="updateModel">Update Season</button-action>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const route = useRoute();
const { cid, sid } = route.params;

const parentData = ref({});
const loaded = ref(false);

const data = ref({
  competition_id: cid,
  name: '',
  startDate: '',
  endDate: '',
})

api.seasons.show(sid, (response) => {
  const { competition, ...season } = response;
  parentData.value = competition;
  data.value = season;
  loaded.value = true;
});

const updateModel = () => {
  api.seasons.update(sid, data.value, () => navigateTo(`/competitions/${cid}/seasons/${sid}`));
}

definePageMeta({ requiresAuth: true, name: 'Edit Season' })
</script>