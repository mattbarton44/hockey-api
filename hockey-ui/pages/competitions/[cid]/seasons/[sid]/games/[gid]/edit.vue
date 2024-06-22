<template>
  <div class="w-full" v-if="loaded">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <h3 class="text-lg font-semibold leading-6 text-gray-900 py-2">{{parentData?.competition?.name}} {{parentData.name}} - Edit Game</h3>
    </div>
    <div class="w-full flex space-x-12 py-6">


      <div class="px-4 sm:px-6 lg:px-2 w-48">
        <nav class="flex justify-center" aria-label="Progress">
          <ol role="list" class="space-y-6 w-full">
            <li v-for="step in steps" :key="step.name" class="cursor-pointer">
              <a v-if="step.status === 'complete'" @click.prevent="setStep(step.name)" class="group cursor-pointer">
                <span class="flex items-start">
                  <span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center">
                    <CheckCircleIcon class="h-full w-full text-great-blue-600 group-hover:text-great-blue-800" aria-hidden="true" />
                  </span>
                  <span class="ml-3 text-sm font-medium text-gray-500 group-hover:text-gray-900">{{ step.name }}</span>
                </span>
              </a>
              <a v-else-if="step.status === 'current'" @click.prevent="setStep(step.name)" class="flex items-start cursor-pointer" aria-current="step">
                <span class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center" aria-hidden="true">
                  <span class="absolute h-4 w-4 rounded-full bg-great-blue-200" />
                  <span class="relative block h-2 w-2 rounded-full bg-great-blue-600" />
                </span>
                <span class="ml-3 text-sm font-medium text-great-blue-600">{{ step.name }}</span>
              </a>
              <a v-else @click.prevent="setStep(step.name)" class="group">
                <div class="flex items-start">
                  <div class="relative flex h-5 w-5 flex-shrink-0 items-center justify-center cursor-pointer" aria-hidden="true">
                    <div class="h-2 w-2 rounded-full bg-gray-300 group-hover:bg-gray-400" />
                  </div>
                  <p class="ml-3 text-sm font-medium text-gray-500 group-hover:text-gray-900">{{ step.name }}</p>
                </div>
              </a>
            </li>
            <li class="flex items-center border-t border-gray-900/10 py-4 w-full">
              <button-action @click="updateModel" class="w-full">Update Game</button-action>
            </li>
          </ol>
        </nav>
      </div>



      <div class="overflow-hidden bg-white shadow sm:rounded-lg w-full" >

        <div v-if="activeStep === 'Details'">

          
          <div class="flex justify-between border-gray-200 border-b">
            <div class="text-base font-semibold py-6 px-6">
              Details
            </div>
            <div class="flex space-x-4 px-6">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-8 p-8">

            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
              <div class="mt-2">
                <input type="text" v-model="data.name" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
              </div>
            </div>

            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Time</label>
              <div class="mt-2">
                <input
                  class="py-1 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none"
                  v-model="data.time"
                  type="datetime-local"
                  :min="parentData.startDate"
                  :max="parentData.endDate"
                />
              </div>
            </div>

            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Home Team</label>
              <div class="mt-2">
                <select v-model="data.home_team_id" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                  <option v-for="team in teamOptions" :value="team.id">{{ team.name }}</option>
                </select>
              </div>
            </div>

            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Away Team</label>
              <div class="mt-2">
                <select v-model="data.away_team_id" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                  <option v-for="team in teamOptions" :value="team.id">{{ team.name }}</option>
                </select>
              </div>
            </div>

            <div class="space-y-2">
              <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Use home venue</label>
                <div class="mt-2">
                  <input type="checkbox" v-model="data.use_home_venue" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" />
                </div>
              </div>

              <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Venue Name</label>
                <div class="mt-2">
                  <input v-if="data.use_home_venue" type="text" :value="homeTeamVenue.venueName" disabled class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                  <input v-else type="text" v-model="data.venueName" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                </div>
              </div>

              <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Venue Address</label>
                <div class="mt-2">
                  <input v-if="data.use_home_venue" type="text" :value="homeTeamVenue.venueAddress" disabled class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                  <input v-else type="text" v-model="data.venueAddress" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                </div>
              </div>
            </div>

            <div class="space-y-8">

              <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                <div class="mt-2">
                  <select v-model="data.type" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                    <option v-for="opt in GAME_TYPES" :value="opt">{{ opt }}</option>
                  </select>
                </div>
              </div>

              <div class="">
                <label class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                <div class="mt-2">
                  <select v-model="data.status" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                    <option v-for="opt in GAME_STATUSES" :value="opt">{{ opt }}</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          
        </div>

        <div v-if="activeStep === 'Home Roster'">
          <div class="flex justify-between">
            <div class="text-base font-semibold py-6 px-6">
              Home Roster
            </div>
            <div class="flex space-x-4 px-6">
              <button-action class="h-8 my-auto" @click.prevent="data.homePlayers.forEach((hr) => hr.isSelected = true)">
                Select All
              </button-action>
              <button-action class="h-8 my-auto" @click.prevent="data.homePlayers.forEach((hr) => hr.isSelected = false)">
                Deselect All
              </button-action>
            </div>
          </div>
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-gray-200">
                  <th class="">Selected ({{ data.homePlayers.filter((hr) => hr.isSelected).length }})</th>
                  <th class="py-2">Name</th>
                  <th class="">Captain ({{ data.homePlayers.filter((hr) => hr.isCaptain).length }})</th>
                  <th class="">Assistant ({{ data.homePlayers.filter((hr) => hr.isAssistant).length }})</th>
                  <th class="">Netminder ({{ data.homePlayers.filter((hr) => hr.isNetminder).length }})</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="p in data.homePlayers" class="px-4 ">
                  <td class="text-center"><input type="checkbox" v-model="p.isSelected" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                  <td class="py-2">{{ p.name }}</td>
                  <td class="text-center"><input type="checkbox" v-model="p.isCaptain" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                  <td class="text-center"><input type="checkbox" v-model="p.isAssistant" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                  <td class="text-center"><input type="checkbox" v-model="p.isNetminder" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div v-if="activeStep === 'Away Roster'">
          <div class="flex justify-between">
            <div class="text-base font-semibold py-6 px-6">
              Away Roster
            </div>
            <div class="flex space-x-4 px-6">
              <button-action class="h-8 my-auto" @click.prevent="data.awayPlayers.forEach((hr) => hr.isSelected = true)">
                Select All
              </button-action>
              <button-action class="h-8 my-auto" @click.prevent="data.awayPlayers.forEach((hr) => hr.isSelected = false)">
                Deselect All
              </button-action>
            </div>
          </div>
          <div class="text-sm">
            <table class="w-full">
              <thead class="text-xs text-gray-800">
                <tr class="bg-gray-100 border-y border-gray-200">
                  <th class="">Selected ({{ data.awayPlayers.filter((hr) => hr.isSelected).length }})</th>
                  <th class="py-2">Name</th>
                  <th class="">Captain ({{ data.awayPlayers.filter((hr) => hr.isCaptain).length }})</th>
                  <th class="">Assistant ({{ data.awayPlayers.filter((hr) => hr.isAssistant).length }})</th>
                  <th class="">Netminder ({{ data.awayPlayers.filter((hr) => hr.isNetminder).length }})</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="p in data.awayPlayers" class="px-4 ">
                  <td class="text-center"><input type="checkbox" v-model="p.isSelected" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                  <td class="py-2">{{ p.name }}</td>
                  <td class="text-center"><input type="checkbox" v-model="p.isCaptain" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                  <td class="text-center"><input type="checkbox" v-model="p.isAssistant" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                  <td class="text-center"><input type="checkbox" v-model="p.isNetminder" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" /></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div v-if="activeStep === 'Result'">
          <div class="flex justify-between border-gray-200 border-b">
            <div class="text-base font-semibold py-6 px-6">
              Result
            </div>
            <div class="flex space-x-4 px-6">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4 p-8">

            <div class="col-span-2">
              <label class="block text-sm font-medium leading-6 text-gray-900">Score Type</label>
              <div class="mt-2">
                <select v-model="data.scoreType" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                  <option v-for="opt in SCORE_TYPES" :value="opt">{{ opt }}</option>
                </select>
              </div>
            </div>
            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Home Team Score</label>
              <div class="mt-2">
                <input type="number" v-model="data.homeTeamScore" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
              </div>
            </div>
            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Away Team Score</label>
              <div class="mt-2">
                <input type="number" v-model="data.visitingTeamScore" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
              </div>
            </div>
            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Home Team Shootout Score</label>
              <div class="mt-2">
                  <input v-if="data.scoreType !== 'SO'" type="number" disabled class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                  <input v-else type="number" v-model="data.homeTeamScoreSo" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                </div>
            </div>
            <div class="">
              <label class="block text-sm font-medium leading-6 text-gray-900">Away Team Shootout Score</label>
              <div class="mt-2">
                  <input v-if="data.scoreType !== 'SO'" type="number" disabled class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                  <input v-else type="number" v-model="data.visitingTeamScoreSo" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
                </div>
            </div>
          </div>
        </div>

        <div v-if="activeStep === 'Events'">

          
          <div class="flex justify-between border-gray-200 border-b">
            <div class="text-base font-semibold py-6 px-6">
              Events
            </div>
            <div class="flex space-x-4 px-6">
            </div>
          </div>
          <div class="p-8">
            <div class="grid grid-cols-3 gap-8" v-if="data.home_team_id && data.away_team_id">
              <button-action @click.prevent="eventGoalModal = true">Add Goal</button-action>
              <button-action @click.prevent="eventPenaltyModal = true">Add Penalty</button-action>
              <button-action @click.prevent="eventNetminderModal = true">Add Netminder Stats</button-action>
            </div>
            <div class="text-center text-sm text-gray-600" v-else>
              Please select a home team and an away team before adding an event
            </div>
            <div class="">
              <div class="text-sm my-8">
                <table class="w-full">
                  <thead class="text-xs text-gray-800">
                    <tr class="bg-gray-100 border-y border-gray-200">
                      <th class="py-2">Time</th>
                      <th class="py-2">Type</th>
                      <th class="py-2">Team</th>
                      <th class="py-2" colspan="3">Details</th>
                      <th class="py-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 text-gray-700">
                    <tr v-for="event in data.events" class="px-4">
                      <td class="py-2">{{ event.time }}</td>
                      <td class="py-2">{{ event.type }}</td>
                      <td class="py-2">{{ teamOptions.find((t) => t.id === event.team).name }}</td>

                      <td class="py-2" v-if="event.type === 'Goal'">
                        <span v-if="playerLookup[event.goal]" class="font-semibold">G:</span>
                        {{ playerLookup[event.goal] }}
                      </td>
                      <td class="py-2" v-if="event.type === 'Goal'">
                        <span v-if="playerLookup[event.assist1]" class="font-semibold">A:</span>
                        {{ playerLookup[event.assist1] }}
                      </td>
                      <td class="py-2" v-if="event.type === 'Goal'">
                        <span v-if="playerLookup[event.assist2]" class="font-semibold">A:</span>
                        {{ playerLookup[event.assist2] }}
                      </td>

                      <td class="py-2" v-if="event.type === 'Penalty'">{{ playerLookup[event.penalty_player] }}</td>
                      <td class="py-2" v-if="event.type === 'Penalty'">{{ PENALTY_TYPES.find((p) => p.code === event.penalty_type).short }}</td>
                      <td class="py-2" v-if="event.type === 'Penalty'">{{ event.penalty_mins }}</td>

                      <td class="py-2" v-if="event.type === 'NM'">{{ event.mins }}</td>
                      <td class="py-2" v-if="event.type === 'NM'">{{ event.shots }}</td>
                      <td class="py-2" v-if="event.type === 'NM'">{{ event.ga }}</td>

                      <td class="">actions</td>
                    </tr>
                    <tr v-if="data.events.length === 0">
                      <td  class="py-2 text-center" colspan="7">No Events</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div v-if="activeStep === 'Statistics'">
          <div class="flex justify-between border-gray-200 border-b">
            <div class="text-base font-semibold py-6 px-6">
              Statistics
            </div>
            <div class="flex space-x-4 px-6">
            </div>
          </div>
          <div class="p-8">
              // generate from events checkbox
          </div>
        </div>

        <div v-if="activeStep === 'Preview'">
        </div>

        
        
      </div>
    </div>
    
    <modal-eventGoal :data="data" :teams="teamOptions" :open="eventGoalModal" @closeModal="eventGoalModal = false" />
    <modal-eventPenalty :data="data" :teams="teamOptions" :open="eventPenaltyModal" @closeModal="eventPenaltyModal = false" />
    <modal-eventNetminder :data="data" :teams="teamOptions" :open="eventNetminderModal" @closeModal="eventNetminderModal = false" />
  </div>
</template>

<script setup>
import { CheckCircleIcon } from '@heroicons/vue/20/solid'
import { GAME_TYPES, GAME_STATUSES, SCORE_TYPES, PENALTY_TYPES } from '@/constants.js';
const route = useRoute();
const { cid, sid, gid } = route.params;

// current / complete / upcoming
const steps = ref([ 
  { name: 'Details', status: 'current' },
  { name: 'Home Roster', status: 'upcoming' },
  { name: 'Away Roster', status: 'upcoming' },
  { name: 'Result', status: 'upcoming' },
  { name: 'Events', status: 'upcoming' },
  { name: 'Statistics', status: 'upcoming' },
  { name: 'Preview', status: 'upcoming' },
]);

const activeStep = ref('Details');

const setStep = (step) => {
  steps.value.find((s) => s.status === 'current').status = 'complete';
  activeStep.value = step;
  steps.value.find((s) => s.name === step).status = 'current';
}

const parentData = ref({});
const loaded = ref(false);
const data = ref({
  season_id: sid,
  use_home_venue: true,
  home_team_id: null,
  away_team_id: null,
  venueName: null,
  venueAddress: null,
  time: new Date().toISOString().slice(0, 16),
  status: 'Upcoming',
  scoreType: null,
  homeTeamScore: null,
  visitingTeamScore: null,
  homeTeamScoreSo: null,
  visitingTeamScoreSo: null,
  type: 'League',
  homePlayers: [],
  awayPlayers: [],
  events: [],
  statistics: [],
});

const playerLookup = computed(() => [...data.value.homePlayers, ...data.value.awayPlayers].reduce((p, c) => ({ ...p, [c.id]: c.name }), {}));

api.games.edit(gid, (d) => { 
  const { season, ...g } = d;
  parentData.value = season;
  data.value = { ...g, time: g.time.split(" ").join("T") };
  loaded.value = true;
  console.log(parentData.value);
  console.log(data.value);
});

watch(() => data.value.home_team_id,
  (newValue) => {
    if(newValue === null) return;
    data.value.homePlayers = [];
    api.rosters.show(newValue, (d) => {
      data.value.homePlayers = d.players.map((pl) => ({
        id: pl.id,
        name: pl.player.fullName,
        isSelected: true,
        isCaptain: false,
        isAssistant: false,
        isNetminder: false
      })).sort(function (a, b) { 
        if (a.name < b.name) { return -1; }
        if (a.name > b.name) { return 1; }
        return 0;
      })
    });
  },
  { deep: true }
);

watch(() => data.value.away_team_id,
  (newValue) => {
    if(newValue === null) return;
    data.value.awayPlayers = [];
    api.rosters.show(newValue, (d) => {
      data.value.awayPlayers = d.players.map((pl) => ({
        id: pl.id,
        name: pl.player.fullName,
        isSelected: true,
        isCaptain: false,
        isAssistant: false,
        isNetminder: false
      })).sort(function (a, b) { 
        if (a.name < b.name) { return -1; }
        if (a.name > b.name) { return 1; }
        return 0;
      })
    });
  },
  { deep: true }
);

const updateModel = () => {
  if(data.value.use_home_venue) {
    data.value.venueName = homeTeamVenue.value.venueName;
    data.value.venueAddress = homeTeamVenue.value.venueAddress;
  }
  api.games.update(gid, data.value, (r) => navigateTo(`/competitions/${cid}/seasons/${sid}`));
}

const teamOptions = computed(() => (parentData.value.rosters) ? parentData.value.rosters.map((r) => ({ id: r.id, name: r.team.name })) : []);

const homeTeamVenue = computed(() => {
  if(parentData.value.rosters && data.value.home_team_id != null) {
    const roster = parentData.value.rosters.find((r) => r.id === data.value.home_team_id);
    return { venueName: roster.team.venueName, venueAddress: roster.team.venueAddress };
  }
  return { venueName: '', venueAddress: '' };
});

let eventGoalModal = ref(false);
let eventPenaltyModal = ref(false);
let eventNetminderModal = ref(false);

definePageMeta({ requiresAuth: true });
</script>