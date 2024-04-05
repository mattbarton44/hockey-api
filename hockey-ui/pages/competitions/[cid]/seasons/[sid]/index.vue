<template>
  <div class="">
    <div class="grid xl:grid-cols-3 lg:grid-cols-2 grid-cols-1 gap-4" v-if="data">
      <div class="bg-white border border-grey-600 w-full flex col-span-2">
        <div class="p-2">
          <img :src="data.logoUrl || data.competition.logoUrl ||'/images/default-logo.png'" class="w-20 h-20"/>
        </div>
        <div class="my-auto">
          <div class="text-3xl font-semibold py-2 px-6">{{data.competition.name}} - {{data.name}}</div>         
          <div class="text-sm px-6" v-if="data.competition.description">
            {{ data.competition.description }}
          </div>
        </div>
      </div>

      <div class="bg-white border border-grey-600 w-full flex">
        <div class="w-full">
          <div class="grid grid-cols-3 gap-2 w-full p-2 my-auto h-full">
            <navButton @click="spawnAllGames">Spawn All Games</navButton>
            <navButton>Create a Game</navButton>
            <navButton>Add a team ?</navButton>
            <navButton>Button</navButton>
            <navButton>Button</navButton>
            <navButton>Button</navButton>
          </div>
        </div>
      </div>

      <div class="">
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold p-6 flex justify-between">
            <div>Teams</div>
            <div><navButton>Add New</navButton></div>
          </div>
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
          <div class="text-base font-semibold p-6 flex justify-between">
            <div>Games</div>
            <div><navButton @click="navigateTo(`/competitions/${cid}/seasons/${sid}/games/new`)">Add New</navButton></div>
          </div>
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-grey-600">
                  <th class="py-2 text-left pl-4">DATE</th>
                  <th class="px-6">MATCHUP</th>
                  <th class="text-left">LOCATION</th>
                  <th class="text-left">ACTIONS</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d, i in allGames" class="px-4">
                  <td class="pl-4">
                    <div>{{ (d.time) ? new Intl.DateTimeFormat('en-GB', { dateStyle: 'short' }).format(new Date(d.time)) : 'TBC' }}</div>
                    <div v-if="d.time"><span class="text-gray-500 text-xs">F/O:</span> {{new Intl.DateTimeFormat('en-GB', { timeStyle: 'short' }).format(new Date(d.time)) }}</div>
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
                  <td class="whitespace-nowrap">{{d.venueName}}</td>
                  <td class="whitespace-nowrap font-semibold space-x-2">
                    <navButton @click="navigateTo(`/competitions/${cid}/seasons/${sid}/games/${d.id}`)">View</navButton>
                    <navButton @click="navigateTo(`/competitions/${cid}/seasons/${sid}/games/${d.id}/edit`)">Edit</navButton>
                    <navButton @click="deleteGame(d.id)">Delete</navButton>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      
      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Standings</div>         
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-grey-600">
                  <th class="py-2 text-left pl-6" colspan="2">TEAM POSITIONS</th>
                  <th class="w-12">GP</th>
                  <th class="w-12">W</th>
                  <th class="w-12">L</th>
                  <th class="w-12">OTL</th>
                  <th class="w-12">PTS</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="t, i in standings" class="px-4">
                  <td class="text-center w-16 pl-4 pr-4 font-semibold">{{ i+1 }}</td>
                  <td class="flex py-2">
                    <img class="w-6 h-6 mr-3 my-auto" :src="t.logo" />
                    <span class="font-semibold">{{t.team}}</span>
                  </td>
                  <td class="text-center whitespace-nowrap font-semibold">{{t.gp}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.w}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.l}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.otl}}</td>
                  <td class="text-center whitespace-nowrap font-semibold">{{t.pts}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Standings</div>         
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-grey-600">
                  <th class="py-2 text-left pl-6" colspan="2">TEAM POSITIONS</th>
                  <th class="w-10">GP</th>
                  <th class="w-10">W</th>
                  <th class="w-10">L</th>
                  <th class="w-10">OTL</th>
                  <th class="w-10">GF</th>
                  <th class="w-10">GA</th>
                  <th class="w-10">GD</th>
                  <th class="w-10">PTS</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="t, i in standings" class="px-4">
                  <td class="text-center w-12 pl-4 pr-4 font-semibold">{{ i+1 }}</td>
                  <td class="flex py-2">
                    <img class="w-6 h-6 mr-3 my-auto" :src="t.logo" />
                    <span class="font-semibold">{{t.team}}</span>
                  </td>
                  <td class="text-center whitespace-nowrap font-semibold">{{t.gp}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.w}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.l}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.otl}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.gf}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.ga}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.gd}}</td>
                  <td class="text-center whitespace-nowrap font-semibold">{{t.pts}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      
      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Standings</div>         
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-grey-600">
                  <th class="py-2 text-left pl-4" colspan="2">TEAM POSITIONS</th>
                  <th class="w-10">GP</th>
                  <th class="w-10">W</th>
                  <th class="w-10">L</th>
                  <th class="w-10">OTL</th>
                  <th class="w-10">GF</th>
                  <th class="w-10">GA</th>
                  <th class="w-10">GD</th>
                  <th class="w-10">PTS</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="t, i in standings" class="px-4">
                  <td class="text-center w-10 font-semibold">{{ i+1 }}</td>
                  <td class="flex py-2">
                    <span class="font-semibold">{{t.team}}</span>
                  </td>
                  <td class="text-center whitespace-nowrap font-semibold">{{t.gp}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.w}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.l}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.otl}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.gf}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.ga}}</td>
                  <td class="text-center whitespace-nowrap text-grey-700">{{t.gd}}</td>
                  <td class="text-center whitespace-nowrap font-semibold">{{t.pts}}</td>
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
const { cid, sid } = route.params;

let data = ref(null);

const getData = () => {
  axios.get(`http://localhost/api/seasons/${sid}`)
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
  season_id: sid,
  type: 'league',
}

const spawnAllGames = () => {
  axios.get(`http://localhost/api/seasons/${sid}/spawnAllGames`)
  .then((response) => {
    console.log(response)
    getData();
  })
  .catch((e) => console.log(e))
}

const deleteGame = (id) => {
  axios.delete(`http://localhost/api/games/${id}`)
  .then((response) => {
    console.log(response);
    getData();
  })
  .catch((e) => console.log(e))
}

// i think possibly this should come from the api and be calculated there and just the info sent across
const standings = computed(() => {
  if(data.value === null) return [];
  const scoring = { w: 2, l: 0, otl: 1 };
  const games = data.value.games;
  const rosters = data.value.rosters;
  return rosters.map((r) => ({ team: r.team.name, logo: r.team.logoUrl,  ...games.reduce((a, g) => {
    if([g.home_team_id ,g.away_team_id].includes(r.team.id) && g.status === 'COMPLETED' && g.type === 'league') {
      let w = 0, l = 0, otl = 0;
      if(g.home_team_id === r.team.id) {
        if(g.scoreType !== 'SO') {
          if(g.homeTeamScore > g.visitingTeamScore) w++;
          else if (g.scoreType === 'OT') otl++;
          else l++;
        } else if(g.homeTeamScoreSo > g.visitingTeamScoreSo) w++;
        else otl++;
      } else {
        if(g.scoreType !== 'SO') {
          if(g.homeTeamScore < g.visitingTeamScore) w++;
          else if (g.scoreType === 'OT') otl++;
          else l++;
        } else if(g.homeTeamScoreSo < g.visitingTeamScoreSo) w++;
        else otl++;
      }
      return { gp: a.gp + 1, w: a.w + w, l: a.l + l, otl: a.otl + otl, pts: a.pts + ((w*scoring.w) + (otl*scoring.otl) + (l*scoring.l)) }
    }
    return a;
  }, { gp: 0, w: 0, l: 0, otl: 0, pts: 0 }) 
  })).sort((a, b) => b.pts - a.pts)
  // put gd into here as a secondary sort? also put gf/ga/gd into expanded table?
  // move this logic into a api call, implement scoring and 'tiebreakers' in the competition/seasons schema to use to calculate
});



definePageMeta({ requiresAuth: true, name: 'View Season' });
</script>