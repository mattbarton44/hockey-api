<template>
  <div class="bg-gray-100 p-8">
    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4" v-if="data">
      
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

      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Upcoming Fixtures</div>
          <div class="text-sm">
            <table class="w-full border-t border-gray-200">
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d in data.games.filter((g) => g.status === 'UPCOMING').slice(0, 5)" class="px-4">
                  <div class="w-full p-4">
                    <div class="flex justify-between mx-4">
                      <div class="flex py-2 w-1/2">
                        <img class="w-10 h-10 mr-3 my-auto" :src="d.home_team.logoUrl" />
                        <span class="font-semibold text-md my-auto">{{d.home_team.name}}</span>
                      </div>
                      <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
                        vs
                      </div>
                      <div class="flex py-2 w-1/2 justify-end text-right">
                        <span class="font-semibold text-md my-auto">{{d.away_team.name}}</span>
                        <img class="w-10 h-10 ml-3 my-auto" :src="d.away_team.logoUrl" />
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
      </div>
      
      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Upcoming Fixtures</div>
          <div class="text-sm">
            <table class="w-full border-t border-gray-200">
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d in data.games.filter((g) => g.status === 'UPCOMING').slice(0, 5)" class="px-4">
                  <div class="w-full p-4">
                    <div class="flex justify-between mx-4">
                      <div class="flex py-2 w-1/2">
                        <img class="w-10 h-10 mr-3 my-auto" :src="d.home_team.logoUrl" />
                        <span class="font-semibold text-md my-auto">{{d.home_team.name}}</span>
                      </div>
                      <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
                        vs
                      </div>
                      <div class="flex py-2 w-1/2 justify-end text-right">
                        <span class="font-semibold text-md my-auto">{{d.away_team.name}}</span>
                        <img class="w-10 h-10 ml-3 my-auto" :src="d.away_team.logoUrl" />
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
      </div>
      
      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Upcoming Fixtures</div>
          <div class="text-sm">
            <table class="w-full border-t border-gray-200">
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d in data.games.filter((g) => g.status === 'UPCOMING').slice(0, 5)" class="px-4">
                  <div class="w-full p-4">
                    <div class="flex justify-between mx-4">
                      <div class="flex py-2 w-1/2">
                        <img class="w-10 h-10 mr-3 my-auto" :src="d.home_team.logoUrl" />
                        <span class="font-semibold text-md my-auto">{{d.home_team.name}}</span>
                      </div>
                      <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
                        vs
                      </div>
                      <div class="flex py-2 w-1/2 justify-end text-right">
                        <span class="font-semibold text-md my-auto">{{d.away_team.name}}</span>
                        <img class="w-10 h-10 ml-3 my-auto" :src="d.away_team.logoUrl" />
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
      </div>

      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Latest Results</div>
          <div class="text-sm">
            <table class="w-full border-t border-gray-200">
              <tbody class="">
                <tr v-for="d in lastestResultsGames" class="">
                  
                  <div class="flex justify-center pt-4 pb-2 font-semibold text-xs">
                    {{new Intl.DateTimeFormat('en-GB', { dateStyle: 'full' }).format(new Date(d.time)) }}
                  </div>
                  <div class="w-full">
                    <div class="flex justify-between" :style="{ background: `linear-gradient(135deg, ${d.home_team.primaryColour} 35%, white 35%, white 65%, ${d.away_team.primaryColour} 65%`}">

                      <div class="flex py-4 w-4/12" :style="{ color: d.home_team.secondaryColour }">
                        <span class="font-semibold text-md my-auto text-center w-full">{{d.home_team.name}}</span>
                      </div>

                      <div class="w-4/12 text-center text-xs text-gray-500 font-semibold h-12">
                        <div class="flex justify-center pt-1 h-12">
                          <div
                            class="text-3xl"
                            :class="{ 'text-black': d.winner === 'home' }"
                          >
                            {{ d.homeGoals }}
                          </div>
                          <div class="text-3xl px-4 text-gray-500">-</div>
                          <div
                            class="text-3xl"
                            :class="{ 'text-black': d.winner === 'away' }"
                          >
                            {{ d.awayGoals }}
                          </div>
                        </div>
                        <div class="-mt-3 text-[0.5rem]">{{ d.scoreType }}</div>
                      </div>

                      <div class="flex py-4 w-4/12" :style="{ color: d.away_team.secondaryColour }">
                        <span class="font-semibold text-md my-auto text-center w-full">{{d.away_team.name}}</span>
                      </div>
                    </div>
                  </div>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      <div>
        <div class="bg-white border border-grey-600 w-full">
          <div class="text-base font-semibold py-6 px-6">Latest Results</div>
          <div class="text-sm">
            <table class="w-full border-t border-gray-200">
              <tbody class="divide-y divide-gray-200">
                <tr v-for="d in lastestResultsGames" class="px-4">
                  <div class="w-full p-4">
                    <div class="flex justify-between mx-4">
                      <div class="flex py-2 w-1/2">
                        <img class="w-10 h-10 mr-3 my-auto" :src="d.home_team.logoUrl" />
                        <span class="font-semibold text-md my-auto">{{d.home_team.name}}</span>
                      </div>
                      <div class="py-2 my-auto w-8 text-center text-xs text-gray-500 font-semibold">
                        vs
                      </div>
                      <div class="flex py-2 w-1/2 justify-end text-right">
                        <span class="font-semibold text-md my-auto">{{d.away_team.name}}</span>
                        <img class="w-10 h-10 ml-3 my-auto" :src="d.away_team.logoUrl" />
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
      </div>
      
    </div>
  </div>
</template>

<script setup>
import axios from 'axios'

const route = useRoute();
const id = route.params;

let data = ref(null);
axios.get(`http://localhost/api/seasons/${route.params.id}`)
.then((response) => {
  data.value = response.data.data;
})
.catch((e) => console.log(e))

const lastestResultsGames = computed(() => {
  return data.value.games
    .filter((g) => g.status === 'COMPLETED')
    .sort((a, b) => Date.parse(b.time) - Date.parse(a.time)) // most recent first
    .slice(0, 5) // limit to 5
    .map((g) => {
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
})

/*
{
    "status": true,
    "data": {
        "id": 1,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "name": "23/24",
        "startDate": "2023-09-01",
        "endDate": "2024-08-31",
        "competition_id": 1,
        "rosters": [
            {
                "id": 1,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "season_id": 1,
                "team_id": 3,
                "metadata": null,
                "team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2,
                    "club": {
                        "id": 2,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "name": "Sheffield Ice Tigers",
                        "nickname": "Ice Tigers",
                        "description": null,
                        "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                        "venueName": "Ice Sheffield",
                        "venueAddress": "Coleridge Road, S22BZ",
                        "primaryColour": "#18b6db",
                        "secondaryColour": "#262221"
                    }
                }
            },
            {
                "id": 3,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "season_id": 1,
                "team_id": 4,
                "metadata": null,
                "team": {
                    "id": 4,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Samurai",
                    "nickname": "Samurai",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2022/12/Samuria-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#c81930",
                    "secondaryColour": "#000000",
                    "club_id": 3,
                    "club": {
                        "id": 3,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "name": "Samurai",
                        "nickname": "Samurai",
                        "description": null,
                        "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2022/12/Samuria-300x300.jpg",
                        "venueName": "Ice Sheffield",
                        "venueAddress": "Coleridge Road, S22BZ",
                        "primaryColour": "#c81930",
                        "secondaryColour": "#000000"
                    }
                }
            },
            {
                "id": 5,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "season_id": 1,
                "team_id": 5,
                "metadata": null,
                "team": {
                    "id": 5,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Don Valley Vikings",
                    "nickname": "Vikings",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/vikings-128x85.png",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#ff6600",
                    "secondaryColour": "#000000",
                    "club_id": 4,
                    "club": {
                        "id": 4,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "name": "Don Valley Vikings",
                        "nickname": "Vikings",
                        "description": null,
                        "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/vikings-128x85.png",
                        "venueName": "Ice Sheffield",
                        "venueAddress": "Coleridge Road, S22BZ",
                        "primaryColour": "#ff6600",
                        "secondaryColour": "#000000"
                    }
                }
            },
            {
                "id": 7,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "season_id": 1,
                "team_id": 6,
                "metadata": null,
                "team": {
                    "id": 6,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Kingston Cobras",
                    "nickname": "Cobras",
                    "description": null,
                    "logoUrl": "https://scontent-lhr6-1.xx.fbcdn.net/v/t39.30808-6/345057498_780422150364428_831730145373691674_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=0uVHVzkT0KAAX9GEvir&_nc_ht=scontent-lhr6-1.xx&oh=00_AfBBZbPlhWmbxWFPcyrJaAGKZ-wYsrUkXe0k33z40NTivg&oe=659A9738",
                    "venueName": "Hull Ice Arena",
                    "venueAddress": "Kingston St, Hull HU1 2DZ",
                    "primaryColour": "#862325",
                    "secondaryColour": "#e5dfc7",
                    "club_id": 5,
                    "club": {
                        "id": 5,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "name": "Kingston Cobras",
                        "nickname": "Cobras",
                        "description": null,
                        "logoUrl": "https://scontent-lhr6-1.xx.fbcdn.net/v/t39.30808-6/345057498_780422150364428_831730145373691674_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=0uVHVzkT0KAAX9GEvir&_nc_ht=scontent-lhr6-1.xx&oh=00_AfBBZbPlhWmbxWFPcyrJaAGKZ-wYsrUkXe0k33z40NTivg&oe=659A9738",
                        "venueName": "Hull Ice Arena",
                        "venueAddress": "Kingston St, Hull HU1 2DZ",
                        "primaryColour": "#862325",
                        "secondaryColour": "#e5dfc7"
                    }
                }
            },
            {
                "id": 9,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "season_id": 1,
                "team_id": 7,
                "metadata": null,
                "team": {
                    "id": 7,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Cleveland Comets",
                    "nickname": "Comets",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2019/04/comets-128x75.jpg",
                    "venueName": "Billingham Forum",
                    "venueAddress": "The Causeway, Stockton-on-Tees, Billingham TS23 2LJ",
                    "primaryColour": "#c7001e",
                    "secondaryColour": "#ffffff",
                    "club_id": 6,
                    "club": {
                        "id": 6,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "name": "Cleveland Comets",
                        "nickname": "Comets",
                        "description": null,
                        "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2019/04/comets-128x75.jpg",
                        "venueName": "Billingham Forum",
                        "venueAddress": "The Causeway, Stockton-on-Tees, Billingham TS23 2LJ",
                        "primaryColour": "#c7001e",
                        "secondaryColour": "#ffffff"
                    }
                }
            },
            {
                "id": 11,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "season_id": 1,
                "team_id": 8,
                "metadata": null,
                "team": {
                    "id": 8,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Whitley Bay Islanders",
                    "nickname": "Islanders",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/image1-300x300.png",
                    "venueName": "Whitley Bay Ice Rink",
                    "venueAddress": "Hillheads Rd, Whitley Bay NE25 8HP",
                    "primaryColour": "#fae017",
                    "secondaryColour": "#000000",
                    "club_id": 7,
                    "club": {
                        "id": 7,
                        "created_at": null,
                        "updated_at": null,
                        "deleted_at": null,
                        "name": "Whitley Bay Islanders",
                        "nickname": "Islanders",
                        "description": null,
                        "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/image1-300x300.png",
                        "venueName": "Whitley Bay Ice Rink",
                        "venueAddress": "Hillheads Rd, Whitley Bay NE25 8HP",
                        "primaryColour": "#fae017",
                        "secondaryColour": "#000000"
                    }
                }
            }
        ],
        "games": [
            {
                "id": 4,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "challenge",
                "metadata": null,
                "status": "COMPLETED",
                "scoreType": "FT",
                "time": "2023-11-18 22:20:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": 2,
                "visitingTeamScore": 4,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 5,
                "away_team_id": 3,
                "home_team": {
                    "id": 5,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Don Valley Vikings",
                    "nickname": "Vikings",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/vikings-128x85.png",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#ff6600",
                    "secondaryColour": "#000000",
                    "club_id": 4
                },
                "away_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                }
            },
            {
                "id": 5,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "league",
                "metadata": null,
                "status": "UPCOMING",
                "scoreType": null,
                "time": "2024-01-06 22:10:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": null,
                "visitingTeamScore": null,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 3,
                "away_team_id": 7,
                "home_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                },
                "away_team": {
                    "id": 7,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Cleveland Comets",
                    "nickname": "Comets",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2019/04/comets-128x75.jpg",
                    "venueName": "Billingham Forum",
                    "venueAddress": "The Causeway, Stockton-on-Tees, Billingham TS23 2LJ",
                    "primaryColour": "#c7001e",
                    "secondaryColour": "#ffffff",
                    "club_id": 6
                }
            },
            {
                "id": 6,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "league",
                "metadata": null,
                "status": "UPCOMING",
                "scoreType": null,
                "time": "2024-02-03 22:20:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": null,
                "visitingTeamScore": null,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 4,
                "away_team_id": 3,
                "home_team": {
                    "id": 4,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Samurai",
                    "nickname": "Samurai",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2022/12/Samuria-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#c81930",
                    "secondaryColour": "#000000",
                    "club_id": 3
                },
                "away_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                }
            },
            {
                "id": 7,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "league",
                "metadata": null,
                "status": "UPCOMING",
                "scoreType": null,
                "time": "2024-03-30 22:20:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": null,
                "visitingTeamScore": null,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 5,
                "away_team_id": 3,
                "home_team": {
                    "id": 5,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Don Valley Vikings",
                    "nickname": "Vikings",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/vikings-128x85.png",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#ff6600",
                    "secondaryColour": "#000000",
                    "club_id": 4
                },
                "away_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                }
            },
            {
                "id": 8,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "league",
                "metadata": null,
                "status": "UPCOMING",
                "scoreType": null,
                "time": "2024-05-18 16:40:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": null,
                "visitingTeamScore": null,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 3,
                "away_team_id": 6,
                "home_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                },
                "away_team": {
                    "id": 6,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Kingston Cobras",
                    "nickname": "Cobras",
                    "description": null,
                    "logoUrl": "https://scontent-lhr6-1.xx.fbcdn.net/v/t39.30808-6/345057498_780422150364428_831730145373691674_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=0uVHVzkT0KAAX9GEvir&_nc_ht=scontent-lhr6-1.xx&oh=00_AfBBZbPlhWmbxWFPcyrJaAGKZ-wYsrUkXe0k33z40NTivg&oe=659A9738",
                    "venueName": "Hull Ice Arena",
                    "venueAddress": "Kingston St, Hull HU1 2DZ",
                    "primaryColour": "#862325",
                    "secondaryColour": "#e5dfc7",
                    "club_id": 5
                }
            },
            {
                "id": 9,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "league",
                "metadata": null,
                "status": "UPCOMING",
                "scoreType": null,
                "time": "2024-05-04 16:40:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": null,
                "visitingTeamScore": null,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 3,
                "away_team_id": 4,
                "home_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                },
                "away_team": {
                    "id": 4,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Samurai",
                    "nickname": "Samurai",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2022/12/Samuria-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#c81930",
                    "secondaryColour": "#000000",
                    "club_id": 3
                }
            },
            {
                "id": 10,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "name": null,
                "type": "league",
                "metadata": null,
                "status": "UPCOMING",
                "scoreType": null,
                "time": "2024-03-16 22:10:00",
                "venueName": "Ice Sheffield",
                "venueAddress": "Coleridge Road, S22BZ",
                "homeTeamScore": null,
                "visitingTeamScore": null,
                "homeTeamScoreSo": null,
                "visitingTeamScoreSo": null,
                "season_id": 1,
                "home_team_id": 3,
                "away_team_id": 8,
                "home_team": {
                    "id": 3,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Sheffield Ice Tigers",
                    "nickname": "Ice Tigers",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Sheffield-Ice-Tigers-2021_RoundelLogo-300x300.jpg",
                    "venueName": "Ice Sheffield",
                    "venueAddress": "Coleridge Road, S22BZ",
                    "primaryColour": "#18b6db",
                    "secondaryColour": "#262221",
                    "club_id": 2
                },
                "away_team": {
                    "id": 8,
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "name": "Whitley Bay Islanders",
                    "nickname": "Islanders",
                    "description": null,
                    "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/image1-300x300.png",
                    "venueName": "Whitley Bay Ice Rink",
                    "venueAddress": "Hillheads Rd, Whitley Bay NE25 8HP",
                    "primaryColour": "#fae017",
                    "secondaryColour": "#000000",
                    "club_id": 7
                }
            }
        ],
        "competition": {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "deleted_at": null,
            "name": "Northern Rec Hockey Cup",
            "nickname": "NRHC",
            "description": "Recreational league style cup competition",
            "logoUrl": "https://nrhc.ukaiht.co.uk/wp-content/uploads/2018/12/Norther-rec-logo.png",
            "gameTypes": null,
            "rostersMetadata": null,
            "rosterPlayerMetadata": null,
            "gameMetadata": null
        }
    }
}

*/

definePageMeta({ requiresAuth: true });
</script>