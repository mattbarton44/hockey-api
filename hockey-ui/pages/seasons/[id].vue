<template>
  <div class="bg-gray-100 p-8">
    <div class="grid xl:grid-cols-3 lg:grid-cols-2 grid-cols-1 gap-4" v-if="data">
      <div>games</div>
      <div>rosters -> teams -> clubs</div>
      
      <div class="bg-white border border-grey-600 w-full flex col-span-2">
        <div class="bg-red-200 border border-red-300 px-2 py-2
        ">
          <img :src="data.logoUrl || '/images/default-logo.png'" class="w-20 h-20"/>
        </div>
        <div class="my-auto">
          <div class="text-3xl font-semibold py-2 px-6">{{data.name}}</div>         
          <div class="text-sm px-6" v-if="data.competition.description">
            {{ data.competition.description }}
          </div>
        </div>
      </div>

      <div class="bg-white border border-grey-600 w-full flex">
        <div class="w-full">
          <div class="grid grid-cols-3 gap-2 w-full p-2 my-auto">
            <button class="text-sm bg-blue-700 text-white py-2 px-4 hover:bg-blue-500" @click="spawnAllGames">Spawn All Games</button>
            <button class="text-sm bg-blue-700 text-white py-2 px-4 hover:bg-blue-500">Create a Game</button>
            <button class="text-sm bg-blue-700 text-white py-2 px-4 hover:bg-blue-500">Add a team ?</button>
            <button class="text-sm bg-blue-700 text-white py-2 px-4 hover:bg-blue-500">Button</button>
            <button class="text-sm bg-blue-700 text-white py-2 px-4 hover:bg-blue-500">Button</button>
            <button class="text-sm bg-blue-700 text-white py-2 px-4 hover:bg-blue-500">Button</button>
          </div>
        </div>
      </div>

      <div class="">
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Teams</div>
          <div class="text-sm">
            <table class="w-full">
              
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-grey-600">
                  <th class="py-2 text-left pl-4">NAME</th>
                  <th class="text-left">VENUE</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d, i in data.rosters" class="">
                  <td class="flex space-x-2 px-4 py-2">
                    <img class="w-10 h-10 mr-3 my-auto" :src="d.team.logoUrl" />
                    <div class="my-auto font-semibold">{{  d.team.name }}</div>
                  </td>
                  <td class="text-xs pr-2">
                    <div>{{  d.team.venueName }}</div>
                    <div>{{  d.team.venueAddress }}</div>
                    
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-span-2">
        <div class="bg-white border border-grey-600 w-full col-span-2">
          <div class="text-base font-semibold py-6 px-6">Games</div>
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-grey-600">
                  <th class="py-2 text-left pl-6">DATE</th>
                  <th class="px-6">MATCHUP</th>
                  <th class="text-left">LOCATION</th>
                  <th class="text-left">ACTIONS</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d, i in allGames" class="px-4">
                  <td class="font-semibold pl-6">
                    <div>{{new Intl.DateTimeFormat('en-GB', { dateStyle: 'short' }).format(new Date(d.time)) }}</div>
                    <div><span class="text-gray-500 text-xs">F/O:</span> {{new Intl.DateTimeFormat('en-GB', { timeStyle: 'short' }).format(new Date(d.time)) }}</div>
                  </td>
                  <td class="flex space-x-2 py-2 px-12">
                    <div class="flex space-x-2 grow basis-1/2">
                      <img class="w-10 h-10 mr-3 my-auto" :src="d.home_team.logoUrl" />
                      <span class="font-semibold text-md my-auto">{{d.home_team.name}}</span>
                    </div>
                    <div class="my-auto text-center text-xs text-gray-500 font-semibold">
                      <div v-if="d.status === 'COMPLETED'" class="mt-2">
                        <div class="flex justify-center">
                          <div class="text-2xl" :class="{ 'text-black': d.winner === 'home' }">
                            {{ d.homeGoals }}
                          </div>
                          <div class="px-4 text-gray-500 text-lg my-auto">-</div>
                          <div class="text-2xl" :class="{ 'text-black': d.winner === 'away' }">
                            {{ d.awayGoals }}
                          </div>
                        </div>
                        <div class="-mt-2 text-[0.5rem]">{{ d.scoreType }}</div>
                      </div>
                      <div v-else>vs</div>
                    </div>
                    <div class="flex space-x-2 justify-end text-right grow basis-1/2">
                      <span class="font-semibold text-md my-auto">{{d.away_team.name}}</span>
                      <img class="w-10 h-10 ml-3 my-auto" :src="d.away_team.logoUrl" />
                    </div>
                  </td>
                  <td class="whitespace-nowrap font-semibold">{{d.venueName}}</td>
                  <td class="whitespace-nowrap font-semibold">Buttons here</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios'

const route = useRoute();
const id = route.params;

let data = ref(null);

const getData = () => {
  axios.get(`http://localhost/api/seasons/${route.params.id}`)
  .then((response) => {
    data.value = response.data.data;
  })
  .catch((e) => console.log(e))
}

onMounted(() => {
  getData();
});

const allGames = computed(() => {
  return data.value.games
    // .filter((g) => g.status === 'COMPLETED')
    // .sort((a, b) => Date.parse(b.time) - Date.parse(a.time)) // most recent first
    .sort((a, b) => Date.parse(a.time) - Date.parse(b.time)) // most recent last
    // .slice(0, 5) // limit to 5
    .map((g) => {
      if(g.status != 'COMPLETED') return g;
      let winner = 'home';
      let homeGoals = g.homeTeamScore;
      let awayGoals = g.visitingTeamScore;
      if(g.scoreType === 'SO') {
        if(g.homeTeamScoreSo < g.visitingTeamScoreSo) {
          winner = 'away';
          awayGoals = g.visitingTeamScore+1;
        } else {
          homeGoals = g.homeTeamScore+1;
        }
      } else {
        if(g.homeTeamScore < g.visitingTeamScore) {
          winner = 'away';
        }
      }
      return { ...g, winner, homeGoals, awayGoals }
    })
})


const TBCGameSchema = {
  home_team_id: null,
  away_team_id: null,
  venueName: null,
  venueAddress: null,
  time: null,
  status: 'TBC',
  scoreType: null,
  homeTeamScore: null,
  visitingTeamScore: null,
  homeTeamScoreSo: null,
  visitingTeamScoreSo: null,
  season_id: id,
  type: 'league',
}

const spawnAllGames = () => {
  axios.get(`http://localhost/api/seasons/${route.params.id}/spawnAllGames`)
  .then((response) => {
    console.log(response)
    getData();
  })
  .catch((e) => console.log(e))
}

definePageMeta({ requiresAuth: true });
</script>