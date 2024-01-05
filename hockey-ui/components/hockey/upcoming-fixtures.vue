<template>
  <div class="bg-white border border-grey-600 w-full">
    <slot>
      <div class="text-base font-semibold py-6 px-6">Upcoming Fixtures</div>
    </slot>
    <div class="text-sm">
      <table class="w-full border-t border-gray-200">
        <tbody class="divide-y divide-gray-200">
          <tr v-for="d in props.data" class="px-4">
            <div class="w-full p-4">
              <div class="flex justify-between mx-4">
                <div class="flex py-2 w-1/2">
                  <img class="max-w-12 h-10 mr-3 my-auto" :src="d.home_team.logoUrl" />
                  <span class="font-semibold text-md my-auto">{{d.home_team.name}}</span>
                </div>
                <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
                  vs
                </div>
                <div class="flex py-2 w-1/2 justify-end text-right">
                  <span class="font-semibold text-md my-auto">{{d.away_team.name}}</span>
                  <img class="max-w-12 h-10 ml-3 my-auto" :src="d.away_team.logoUrl" />
                </div>
              </div>
              <div class="flex justify-between mx-4 mt-2 text-xs text-gray-700">
                <div class="text-center text-grey-700">{{d.venueName}}</div>
                <div class="text-center text-grey-700">{{new Intl.DateTimeFormat('en-GB', { dateStyle: 'full', timeStyle: 'short' }).format(new Date(d.time)) }}</div>
              </div>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>

const props = defineProps(['data']);


</script>