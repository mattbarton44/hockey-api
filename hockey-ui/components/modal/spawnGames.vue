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
                  <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">Spawn Games</DialogTitle>
                  <div class="mt-2">
                    <p class="text-xs text-gray-500">This action will spawn home and away fixtures for all teams in the league.</p>
                  </div>
                  <div class="mt-4 space-y-4">
                    
                    <div class="">
                      <label class="block text-sm font-medium leading-6 text-gray-900"># of home games against each other team</label>
                      <div class="mt-2">
                        <input type="text" v-model="spawnData.quantity" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                      </div>
                    </div>
                    
                    <div class="">
                      <label class="block text-sm font-medium leading-6 text-gray-900">Game Type</label>
                      <div class="mt-2">
                        <input type="text" v-model="spawnData.type" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                      </div>
                    </div>
                    
                    <div class="">
                      <label class="block text-sm font-medium leading-6 text-gray-900">Game Status</label>
                      <div class="mt-2">
                        <input type="text" v-model="spawnData.status" class=" py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex mt-4">
                
                <button-action @click="spawnAllGames">Spawn Games</button-action>
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
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
  data: Object,
  open: Boolean,
})

const emit = defineEmits(['closeModal']);
const route = useRoute();
const { cid, sid } = route.params;

const spawnData = ref({
  quantity: 1,
  type: 'league',
  status: 'TBC',
})

const spawnAllGames = () => {
  api.seasons.spawnAllGames(sid, spawnData.value, (response) => emit('closeModal'));
}

</script>