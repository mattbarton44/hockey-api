<template>

  <div class="w-full" v-if="data">
    <div class="border-b border-gray-200">
      <div class="md:flex md:items-center md:justify-between">
        <div class="flex space-x-8">
          <div class="p-2">       
            <ui-logo class="h-20 w-20" :sources="[data.logoUrl, data.competition.logoUrl]" />
          </div>
          <div class="my-auto">
            <h3 class="text-3xl font-semibold leading-6 text-gray-900">{{data.competition.name}} - {{ data.name }}</h3>
            <div class="mt-2 max-w-4xl text-sm text-gray-500" v-if="data.competition.description">
              {{ data.competition.description }}
            </div>
          </div>
        </div>
        <div class="mt-3 sm:ml-4 sm:mt-0">
          <button type="button" @click="navigateTo(`/competitions/${cid}/seasons/${sid}/edit`)" class="inline-flex items-center rounded-md bg-great-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-great-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-great-blue-600">
            Edit Season
          </button>
        </div>
      </div>
      <div class="mt-4">
        <div class="sm:hidden">
          <label for="current-tab" class="sr-only">Select a tab</label>
          <select id="current-tab" name="current-tab" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-great-blue-600">
            <option v-for="tab in tabs" :key="tab" :selected="activeTab === tab">{{ tab }}</option>
          </select>
        </div>
        <div class="hidden sm:block">
          <nav class="-mb-px flex space-x-8">
            <a v-for="tab in tabs" :key="tab" @click.prevent="activeTab = tab" :class="[activeTab === tab ? 'border-great-blue-500 text-great-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium cursor-pointer']">
              {{ tab }}
            </a>
          </nav>
        </div>
      </div>
    </div>

    <div v-if="activeTab === 'Overview'" class="w-full grid grid-cols-2 mt-6 gap-8">
            
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
                  <td class="text-center w-16 px-2 font-semibold">{{ i+1 }}</td>
                  <td class="flex py-2">
                    <ui-logo class="w-6 h-6 mr-3 my-auto" :sources="[t.logo]" />
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
                  <td class="text-center w-12 px-4 font-semibold">{{ i+1 }}</td>
                  <td class="flex py-2">
                    <ui-logo class="w-6 h-6 mr-3 my-auto" :sources="[t.logo]" />
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
    <div v-else-if="activeTab === 'Games'" class="w-full mt-6">


      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
          <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
            <div class="ml-4 mt-2">
              <h3 class="text-base font-semibold leading-6 text-gray-900">Games</h3>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0 space-x-4">
              <button-nav @click="navigateTo(`/competitions/${cid}/seasons/${sid}/games/new`)">Add New</button-nav>
              <button-nav @click="openSAGModal">Spawn All Games</button-nav>
            </div>
          </div>
        </div>
        <div class="">
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
                      <ui-logo class="w-10 h-10 mr-3 my-auto" :sources="[d.home_team.logoUrl]" />
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
                      <span class="font-semibold text-md my-auto mr-3">{{d.away_team.name}}</span>
                      <ui-logo class="w-10 h-10 my-auto" :sources="[d.away_team.logoUrl]" />
                    </div>
                  </td>
                  <td class="whitespace-nowrap">{{d.venueName}}</td>
                  <td class="whitespace-nowrap font-semibold space-x-2 w-32">
                    <button-view @click="navigateTo(`/competitions/${cid}/seasons/${sid}/games/${d.id}`)" />
                    <button-edit @click="navigateTo(`/competitions/${cid}/seasons/${sid}/games/${d.id}/edit`)" />
                    <button-trash @click="deleteGame(d.id)" />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div v-else-if="activeTab === 'Teams'" class="w-full grid grid-cols-2 mt-6 gap-8">
      <div class="">
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold p-6 flex justify-between">
            <div>Teams</div>
            <div><button-nav>Add New</button-nav></div>
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
                    <ui-logo class="w-10 h-10 mr-3 my-auto" :sources="[d.team.logoUrl, d.team.club.logoUrl]" />
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
    </div>
    <spawnGamesModal :data="data" :open="SAGModal" @closeModal="closeSAGModal" />
  </div>
</template>

<script setup>
import { PencilSquareIcon } from '@heroicons/vue/16/solid'


const route = useRoute();
const { cid, sid } = route.params;

let data = ref(null);
const getData = () => api.seasons.show(sid, (d) => data.value = d);
onMounted(() => getData());

const activeTab = ref('Games');
const tabs = ['Overview', 'Games', 'Teams'];


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

const deleteGame = (id) => api.games.destroy(id, () => getData());

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


let SAGModal = ref(false);
const openSAGModal = () => SAGModal.value = true;
const closeSAGModal = () => {
  SAGModal.value = false; 
  console.log('closing modal')
  getData();
}

definePageMeta({ requiresAuth: true, name: 'View Season' });
</script>