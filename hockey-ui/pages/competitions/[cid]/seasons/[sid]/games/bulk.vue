<template>


  <div class="w-full" v-if="loaded">
    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
      <h3 class="text-lg font-semibold leading-6 text-gray-900 py-2">{{parentData?.competition?.name}} {{parentData.name}} - New Fixtures</h3>
    </div>
    <div class="w-full grid grid-cols-3 gap-8 mt-8">



      <div class="overflow-hidden bg-white shadow sm:rounded-lg w-full" >
        <div class="flex justify-between border-gray-200 border-b">
          <div class="text-base font-semibold py-6 px-6">
            New Fixture
          </div>
          <div class="flex space-x-4">
            <div class="flex items-center justify-end gap-x-6 px-4 py-4">
              <button-action @click="addToList">Add to List</button-action>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-1 gap-2 p-6">

          
          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Type</label>
            <div class="mt-1">
              <select v-model="data.type" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                <option v-for="opt in GAME_TYPES" :value="opt">{{ opt }}</option>
              </select>
            </div>
          </div>

          <div class="" v-if="data.type === 'Tournament'">
            <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-1">
              <input type="text" v-model="data.name" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Home Team</label>
            <div class="mt-1">
              <select v-model="data.home_team_id" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                <option v-for="team in teamOptions" :value="team.id">{{ team.name }}</option>
              </select>
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Away Team</label>
            <div class="mt-1">
              <select v-model="data.away_team_id" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                <option v-for="team in teamOptions" :value="team.id">{{ team.name }}</option>
              </select>
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Time</label>
            <div class="mt-1">
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
            <label class="block text-sm font-medium leading-6 text-gray-900">Use home venue</label>
            <div class="mt-1">
              <input type="checkbox" v-model="data.use_home_venue" class="h-4 w-4 rounded border-gray-300 text-great-blue-600 focus:ring-great-blue-600" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Venue Name</label>
            <div class="mt-1">
              <input v-if="data.use_home_venue" type="text" :value="homeTeamVenue.venueName" disabled class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
              <input v-else type="text" v-model="data.venueName" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Venue Address</label>
            <div class="mt-1">
              <input v-if="data.use_home_venue" type="text" :value="homeTeamVenue.venueAddress" disabled class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
              <input v-else type="text" v-model="data.venueAddress" class="py-1.5 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none" />
            </div>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Status</label>
            <div class="mt-1">
              <select v-model="data.status" class="py-2 px-2 flex w-full rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-great-blue-600 sm:max-w-md outline-none">
                <option v-for="opt in GAME_STATUSES" :value="opt">{{ opt }}</option>
              </select>
            </div>
          </div>
        </div>
      </div>



      <div class="overflow-hidden bg-white shadow sm:rounded-lg w-full col-span-2" >
        <div class="flex justify-between border-gray-200 border-b">
          <div class="text-base font-semibold py-6 px-6">
            List of Fixtures to Create
          </div>
          <div class="flex space-x-4">
            <div class="flex items-center justify-end gap-x-6 px-4 py-4">
              <button-action @click="createModel">Create Fixtures</button-action>
            </div>
          </div>
        </div>
        
        <div class="">
          <table class="w-full">
            <thead class="text-xs text-gray-800">
              <tr class="bg-gray-100 border-y border-grey-600">
                <th class="py-2 text-left pl-4">NAME</th>
                <th class="text-left">HOME TEAM</th>
                <th class="text-left">AWAY TEAM</th>
                <th class="text-left">TIME</th>
                <th class="text-left">TYPE</th>
                <th class="text-left">STATUS</th>
                <th class="text-left">VENUE</th>
                <th class="text-left"></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-xs">
              <tr v-for="fixture, i in fixtureList" class="">
                <td class="pl-4">{{ fixture.name }}</td>
                <td>{{ teamOptions.find((r) => r.id === fixture.home_team_id)?.name }}</td>
                <td>{{ teamOptions.find((r) => r.id === fixture.away_team_id)?.name }}</td>
                <td class="">
                  <div>{{ (fixture.time) ? new Intl.DateTimeFormat('en-GB', { dateStyle: 'short' }).format(new Date(fixture.time)) : 'TBC' }}</div>
                  <div v-if="fixture.time"><span class="text-gray-500 text-xs">F/O:</span> {{new Intl.DateTimeFormat('en-GB', { timeStyle: 'short' }).format(new Date(fixture.time)) }}</div>
                </td>
                <td class="py-4">{{ fixture.type }}</td>
                <td class="">{{ fixture.status }}</td>
                <td class="">
                  <div>{{  fixture.venueName }}</div>
                  <div>{{  fixture.venueAddress }}</div>
                </td>
                <td class="whitespace-nowrap font-semibold pr-2">
                  <button-trash @click="fixtureList.splice(i, 1)" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { CheckCircleIcon } from '@heroicons/vue/20/solid'
import { GAME_TYPES, GAME_STATUSES, SCORE_TYPES, PENALTY_TYPES } from '@/constants.js';
const route = useRoute();
const { cid, sid } = route.params;


const fixtureList = ref([])
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

api.seasons.show(sid, (d) => { parentData.value = d; loaded.value = true; });

const addToList = () => {
  const g = { ...data.value };
  if(g.use_home_venue) {
    g.venueName = homeTeamVenue.value.venueName;
    g.venueAddress = homeTeamVenue.value.venueAddress;
  }
  fixtureList.value.push(g);
  data.value.home_team_id = null;
  data.value.away_team_id = null;
  data.value.name = null;
}

const createModel = () => {
  api.seasons.bulkStore(sid, fixtureList.value, (r) => navigateTo(`/competitions/${cid}/seasons/${sid}`));
}

const teamOptions = computed(() => (parentData.value.rosters) ? parentData.value.rosters.map((r) => ({ id: r.id, name: r.team.name })) : []);

const homeTeamVenue = computed(() => {
  if(parentData.value.rosters && data.value.home_team_id != null) {
    const roster = parentData.value.rosters.find((r) => r.id === data.value.home_team_id);
    return { venueName: roster.team.venueName, venueAddress: roster.team.venueAddress };
  }
  return { venueName: '', venueAddress: '' };
});

definePageMeta({ requiresAuth: true });
</script>