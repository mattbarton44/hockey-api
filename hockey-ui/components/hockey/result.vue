<template>
  <div class="bg-white border border-grey-600 w-full">
    <slot>
      <div class="text-base font-semibold py-6 px-6">Last Match Result</div>
    </slot>
    <div class="text-sm">
      <div>
        <div class="flex justify-between bg-gray-100 border-y border-gray-200 px-6 py-2 text-xs uppercase font-semibold">
          <div class="">atlantic playoffs</div>
          <div class="">sunday march 26th</div>
        </div>
        <div class="flex justify-between p-6">          
          <div class="py-2">
            <img class="max-w-12 h-10 mr-3 my-auto" :src=" props.data.home_team.logoUrl" />
            <span class="font-semibold text-md my-auto">{{ props.data.home_team.name}}</span>
          </div>
          <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
            Score
          </div>
          <div class="py-2 justify-end text-right">
            <img class="max-w-12 h-10 ml-3 my-auto" :src=" props.data.away_team.logoUrl" />
            <span class="font-semibold text-md my-auto">{{ props.data.away_team.name}}</span>
          </div>

        </div>
      </div>
      <div v-if="props.data.events || true">
        <table>
          <thead>
            <tr>
              <th>Scoreboard</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>OT</th>
              <th>SO</th>
              <th>T</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ props.data.home_team.name }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>{{ props.data.away_team.name }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <div class="">
          <div class="">Game statistics</div>
        </div>
        <div class="grid grid-cols-2">
          <div class="">total shots</div>
          <div class="">total pims</div>
        </div>
      </div>
      <div class="w-full p-4">
        <div class="flex justify-between mx-4">
          <div class="flex py-2 w-1/2">
            <img class="max-w-12 h-10 mr-3 my-auto" :src=" props.data.home_team.logoUrl" />
            <span class="font-semibold text-md my-auto">{{ props.data.home_team.name}}</span>
          </div>
          <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
            vs
          </div>
          <div class="flex py-2 w-1/2 justify-end text-right">
            <span class="font-semibold text-md my-auto">{{ props.data.away_team.name}}</span>
            <img class="max-w-12 h-10 ml-3 my-auto" :src=" props.data.away_team.logoUrl" />
          </div>
        </div>
        <div class="flex justify-between mx-4 mt-2 text-xs text-gray-700">
          <div class="text-center text-grey-700">{{ props.data.venueName}}</div>
          <div class="text-center text-grey-700">{{new Intl.DateTimeFormat('en-GB', { dateStyle: 'full', timeStyle: 'short' }).format(new Date( props.data.time)) }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

const props = defineProps(['data']);


</script>