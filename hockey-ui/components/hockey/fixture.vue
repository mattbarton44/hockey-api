<template>
  <div class="bg-white border border-grey-600 w-full text-gray-700" v-if="props.data">
    <div class="w-full h-24 bg-sky-400" :style="{ background: props.data.home_team.primaryColour }"></div>
    <div class="w-32 -mt-12 h-32 mx-auto bg-white p-4 rounded-full">
      <img src="https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Norther-rec-logo.png">
    </div>
    <div class="text-2xl font-bold p-2 -mt-2 text-center ">Northern Rec Hockey Cup</div>
    <div class="text-xs font-bold text-center uppercase my-1">at {{ props.data.home_team.venueName }}</div>
    <div class="flex justify-center mx-4 my-6">
      <div class="py-2 w-32 text-center text-gray-900">
        <img class="max-w-32 h-24 mx-auto mb-2" :src="props.data.home_team.logoUrl" />
        <span class="font-semibold text-sm mx-auto leading-none">{{props.data.home_team.name}}</span>
      </div>
      <div class="py-2 my-auto text-center text-4xl font-bold w-32 mt-5">
        VS
      </div>
      <div class="py-2 w-32 text-center text-gray-900">
        <img class="max-w-32 h-24 mx-auto mb-2" :src="props.data.away_team.logoUrl" />
        <span class="font-semibold text-sm mx-auto leading-none">{{props.data.away_team.name}}</span>
      </div>
    </div>
    <div class="w-full bg-sky-400" :style="{ background: props.data.home_team.primaryColour }">

      <div class="flex justify-center p-4 text-white font-semibold uppercase space-x-12">
        <div>
          {{ new Intl.DateTimeFormat('en-GB', { weekday: "long", day: "numeric", month: "short" }).format(new Date(props.data.time)) }}
        </div>
        <div>
          Face off {{ new Intl.DateTimeFormat('en-GB', { hour: 'numeric',  minute: 'numeric' }).format(new Date(props.data.time)) }}
        </div>
        </div>
    </div>
  </div>
</template>

<script setup>

const props = defineProps(['data']);


</script>