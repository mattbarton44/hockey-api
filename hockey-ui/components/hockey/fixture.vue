<template>
  <div>
    <div class="bg-white border border-grey-600 w-full text-gray-700" v-if="props.data">
      <div class="w-full h-24 bg-sky-400" :style="{ background: props.data.home_team.primaryColour }"></div>
      <div class="w-32 -mt-12 h-32 mx-auto bg-white p-4 rounded-full">
        <img src="https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Norther-rec-logo.png">
      </div>
      <div class="text-2xl font-bold p-2 -mt-2 text-center ">{{ props.data.competition.name }}</div>
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

        <div class="flex justify-center p-4 text-white font-semibold uppercase divide-x-2 divide-white text-center">
          <div class="flex justify-center px-8">
              {{ new Intl.DateTimeFormat('en-GB', { day: "2-digit", month: "2-digit", year: "2-digit" }).format(new Date(props.data.time)).split("/").join(".") }}
          </div>
          <div class="flex justify-center px-8">
              {{ new Intl.DateTimeFormat('en-GB', { hour: 'numeric',  minute: 'numeric' }).format(new Date(props.data.time)) }}
          </div>
          <div class="flex justify-center px-8">
            {{ props.data.home_team.venueName }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>

const props = defineProps(['data']);


</script>