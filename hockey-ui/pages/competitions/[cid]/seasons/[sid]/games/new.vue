<template>
  <div class="max-w-xl space-y-4">
    <div class="font-bold">Create New Game</div> 
    <propRow label="Comeptition" :value="parentData.competition?.name" />
    <propRow label="Season" :value="parentData.name" />
    <stackedInput label="Home Team">
      <select v-model="data.home_team_id" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900">
        <option v-for="team in teamOptions" :value="team.id">{{ team.name }}</option>
      </select>
    </stackedInput>
    <stackedInput label="Away Team">
      <select v-model="data.away_team_id" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900">
        <option v-for="team in teamOptions" :value="team.id">{{ team.name }}</option>
      </select>
    </stackedInput>
    <stackedInput label="Use home venue">
      <input type="checkbox" v-model="data.use_home_venue" class="border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Venue Name">
      <input v-if="data.use_home_venue" type="text" :value="homeTeamVenue.venueName" disabled class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
      <input v-else type="text" v-model="data.venueName" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Venue Address" >
      <input v-if="data.use_home_venue" type="text" :value="homeTeamVenue.venueAddress" disabled class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
      <input v-else type="text" v-model="data.venueAddress" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Time">
      <input type="text" v-model="data.time" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
    </stackedInput>
    <stackedInput label="Type">
      <select v-model="data.type" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900">
        <option v-for="opt in GAME_TYPES" :value="opt">{{ opt }}</option>
      </select>
    </stackedInput>
    <hr>
    <stackedInput label="Status">
      <select v-model="data.status" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900">
        <option v-for="opt in GAME_STATUSES" :value="opt">{{ opt }}</option>
      </select>
    </stackedInput>

    <div v-if="data.status === 'Completed'">
      <stackedInput label="Score Type">      
        <select v-model="data.scoreType" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900">
          <option v-for="opt in SCORE_TYPES" :value="opt">{{ opt }}</option>
        </select>
      </stackedInput>
      <stackedInput label="homeTeamScore">
        <input type="text" v-model="data.homeTeamScore" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
      </stackedInput>
      <stackedInput label="visitingTeamScore">
        <input type="text" v-model="data.visitingTeamScore" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
      </stackedInput>
      <stackedInput label="homeTeamScoreSo">
        <input type="text" v-model="data.homeTeamScoreSo" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
      </stackedInput>
      <stackedInput label="visitingTeamScoreSo">
        <input type="text" v-model="data.visitingTeamScoreSo" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" />
      </stackedInput>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createRecord">
        Create Game
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
import { GAME_TYPES, GAME_STATUSES, SCORE_TYPES } from '@/constants.js';
const route = useRoute();
const { cid, sid } = route.params;

const parentData = ref({});

const data = ref({
  season_id: sid,
  use_home_venue: true,
  home_team_id: null,
  away_team_id: null,
  venueName: null,
  venueAddress: null,
  time: new Date().toISOString().slice(0, 16).replace('T', ' '),
  status: 'Upcoming',
  scoreType: null,
  homeTeamScore: null,
  visitingTeamScore: null,
  homeTeamScoreSo: null,
  visitingTeamScoreSo: null,
  type: 'League',
});


axios.get(`http://localhost/api/seasons/${sid}`)
.then((response) => {
  parentData.value = response.data.data;
}).catch((e) => console.log(e));

const createRecord = () => {
  // validate things here
  if(data.value.use_home_venue) {
    data.value.venueName = homeTeamVenue.value.venueName;
    data.value.venueAddress = homeTeamVenue.value.venueAddress;
  }
  axios.post('http://localhost/api/games', data.value)
  .then((response) => {
    navigateTo(`/seasons/${sid}`)
  })
  .catch((e) => console.log(e))
}

const teamOptions = computed(() => (parentData.value.rosters) ? parentData.value.rosters.map((r) => ({ id: r.team.id, name: r.team.name })) : []);

const homeTeamVenue = computed(() => {
  if(parentData.value.rosters && data.value.home_team_id != null) {
    const roster = parentData.value.rosters.find((r) => r.team.id === data.value.home_team_id);
    return { venueName: roster.team.venueName, venueAddress: roster.team.venueAddress };
  }
  return { venueName: '', venueAddress: '' };
});


definePageMeta({ requiresAuth: true });
</script>