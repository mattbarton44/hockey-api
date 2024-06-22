<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="relative z-10" @close="$emit('closeModal')">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
      </TransitionChild>

      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white p-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
              <div class="sm:flex sm:items-start">
                <div class="">
                  <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">Add Penalty</DialogTitle>
                  <div class="mt-4 space-y-4">
                    <div class="flex space-x-4">
                      <label class="text-sm font-medium leading-6 text-gray-900 flex items-center w-24 ">Time</label>
                      <div class="w-20">
                        <input type="text" v-model="spawnData.time" v-maska data-maska="T#:T#" data-maska-tokens="T:[0-6]" data-maska-eager class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                      </div>
                    </div>
                    <div class="flex space-x-4">
                      <label class="text-sm font-medium leading-6 text-gray-900 flex items-center w-24 ">Team</label>
                      <div class="w-60">
                        <select v-model="spawnData.team" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                          <option :value="data.home_team_id">{{ teams.find((t) => t.id === data.home_team_id).name }}</option>
                          <option :value="data.away_team_id">{{ teams.find((t) => t.id === data.away_team_id).name }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="flex space-x-4">
                      <label class="text-sm font-medium leading-6 text-gray-900 flex items-center w-24 ">Player</label>
                      <div class="w-60">
                        <select v-model="spawnData.penalty_player" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                          <option v-for="p in players" :value="p.id">{{ p.name }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="flex space-x-4">
                      <label class="text-sm font-medium leading-6 text-gray-900 flex items-center w-24 ">Penalty</label>
                      <div class="w-60">
                        <select v-model="spawnData.penalty_type" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                          <option v-for="p in PENALTY_TYPES" :value="p.code">{{ p.long }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="flex space-x-4">
                      <label class="text-sm font-medium leading-6 text-gray-900 flex items-center w-24 ">Length</label>
                      <div class="w-60">
                        <select v-model="spawnData.penalty_mins" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                          <option v-for="t in [2, 5, 10, 20, 25]" :value="t">{{ t }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex mt-4">
                <button-action @click="addEvent">Add Event</button-action>
                <button @click="$emit('closeModal')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:ml-3 sm:mt-0 sm:w-auto"  ref="cancelButtonRef">
                  Cancel
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { PENALTY_TYPES } from '@/constants.js';

const props = defineProps({
  data: Object,
  teams: Array,
  open: Boolean,
})

const emit = defineEmits(['closeModal']);
const route = useRoute();
const { cid, sid } = route.params;

const spawnData = ref({
  type: 'Penalty',
});


const addEvent = () => {
  props.data.events.push(spawnData.value);
  emit('closeModal');
};

const players = computed(() => {
 if (spawnData.value.team === props.data.home_team_id) {
  return props.data.homePlayers;
 } else if (spawnData.value.team === props.data.away_team_id) {
  return props.data.awayPlayers;
 }
 return [];
})


</script>