<template>
  <div class="max-w-xl space-y-4">
    <div class="font-bold">Create New Roster</div> 
    <propRow label="Team" :value="teamData.name" />
    <stackedInput label="Season">
      <select v-model="data.season_id" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" >
        <option v-for="season in seasonsData" :value="season.id">{{ season.competition.name }} - {{ season.name }}</option>
      </select>
    </stackedInput>
    <stackedInput label="Players">
      <select v-model="selectedPlayer" class="w-full border py-1.5 px-2 placeholder:text-gray-400 text-sm text-gray-900" >
        <option v-for="player in playersData.filter((p) => !data.players.map((pd) => pd.id).includes(p.id))" :value="player">{{ player.fullName }}</option>
      </select>
    </stackedInput>
    <div>
      <button class="text-xs bg-blue-400 px-2 py-1 rounded-sm hover:bg-blue-600 hover:text-white" @click="data.players.push(selectedPlayer)" :disabled="selectedPlayer === null">
        Add Player
      </button>
    </div>
    <div>
      <div v-for="player in data.players" class="">{{ player.fullName }}</div>
    </div>
    <div>
      <button class="text-xs bg-green-400 px-2 py-1 rounded-sm hover:bg-green-600 hover:text-white" @click="createModel">
        Create Roster
      </button>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
const route = useRoute();
const { cid, tid } = route.params;

const playersData = ref([]);
const seasonsData = ref([]);
const teamData = ref({});

const selectedPlayer = ref(null);

const data = ref({
  team_id: tid,
  season_id: null,
  players: [],
})

axios.get(`http://localhost/api/players`) // this needs to be players by last years roster, by club, or by all
.then((response) => {
  playersData.value = response.data.data;
})
.catch((e) => console.log(e))

axios.get(`http://localhost/api/seasons`)
.then((response) => {
  seasonsData.value = response.data.data;
})
.catch((e) => console.log(e))

axios.get(`http://localhost/api/teams/${tid}`)
.then((response) => {
  teamData.value = response.data.data;
})
.catch((e) => console.log(e))

const createModel = () => {
  axios.post('http://localhost/api/rosters', { ...data.value, players: data.value.players.map((p) => ({ player_id: p.id })) })
  .then((response) => {
    console.log(response);
    navigateTo(`clubs/${cid}/teams/${tid}`)
  })
  .catch((e) => console.log(e))
}

definePageMeta({ requiresAuth: true })
</script>