<template>
  <div class="bg-gray-100 p-8">
    <div class="grid grid-cols-4 gap-8">
      <div class="shadow-md bg-white p-4 text-center rounded-md" v-for="team, name in teams">
        <div class=""><img :src="team.logo" /></div>
        <div class="border-b p-4 text-sm font-semibold">{{ name }}</div>
        <div class="space-y-1 mt-4">
          <div class="" v-for="player, i in team.roster">
            {{ player }} <span v-if="i === 0" class="text-xs">(NM)</span>
          </div>
        </div>
      </div>
      <div class="col-span-2">
        <div class="shadow-md bg-white text-center rounded-md">
          <div class="border-b p-4 text-sm font-semibold">Saturday 13th July</div>
          <div class="space-y-1 divide-y">
            <div class="" v-for="game in saturdayGames">
              <div v-if="game.name === 'Ice Cut'" class="my-2 italic text-sm text-gray-700">
                {{game.name}} {{ game.time }}
              </div>
              <div class="grid grid-cols-8 gap-2 my-2" v-else>
                <div class="col-span-3">
                  <div class="flex" v-if="teams[game.home_team]">
                    <img class="w-20 ml-2 my-auto" :src="teams[game.home_team].logo" />
                    <div class="my-auto">{{ game.home_team }}</div>
                  </div>
                </div>
                <div class="col-span-2 text-center  space-y-2 my-2">
                  <div class="font-semibold text-sm">{{ game.name }}</div>
                  <div class=" text-xs text-gray-700">V</div>
                  <div class="font-semibold text-sm">{{ game.time }}</div>
                </div>
                <div class="col-span-3 ">
                  <div class="flex" v-if="teams[game.away_team]">
                    <div class="my-auto">{{ game.away_team }}</div>
                    <img class="w-20 mr-2 my-auto" :src="teams[game.away_team].logo" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-span-2">
        <div class="shadow-md bg-white text-center rounded-md">
          <div class="border-b p-4 text-sm font-semibold">Sunday 14th July</div>
          <div class="space-y-1 divide-y pb-1">
            <div class="" v-for="game in sundayGames">
              <div v-if="game.home_team == null" class="my-2 italic text-sm text-gray-700">
                {{game.name}} {{ game.time }}
              </div>
              <div class="grid grid-cols-8 gap-2 my-2" v-else>
                <div class="col-span-3">
                  <div class="flex" v-if="teams[game.home_team]">
                    <img class="w-20 ml-2 my-auto" :src="teams[game.home_team].logo" />
                    <div class="my-auto">{{ game.home_team }}</div>
                  </div>
                  <div class="flex text-center  h-full" v-else>
                    <div class="my-auto text-center w-full">{{ game.home_team }}</div>
                  </div>
                </div>
                <div class="col-span-2 text-center  space-y-2 my-2">
                  <div class="font-semibold text-sm">{{ game.name }}</div>
                  <div class=" text-xs text-gray-700">V</div>
                  <div class="font-semibold text-sm">{{ game.time }}</div>
                </div>
                <div class="col-span-3 ">
                  <div class="flex" v-if="teams[game.away_team]">
                    <div class="my-auto">{{ game.away_team }}</div>
                    <img class="w-20 mr-2 my-auto" :src="teams[game.away_team].logo" />
                  </div>
                  <div class="flex text-center  h-full" v-else>
                    <div class="my-auto text-center w-full">{{ game.away_team }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="col-span-2">
        <div class="shadow-md bg-white rounded-md">
          <div class="border-b p-4 text-sm font-semibold text-center">Rules</div>
          <div class="">
            <dl class="divide-y divide-gray-900/10">
              <div class="p-4">
                <dt class="text-base font-semibold leading-7 text-gray-900">How long are the Games?</dt>
                <dd class="mt-2 text-base leading-7 text-gray-600 ">
                  Each game consists of 2 x 25 minute running clock periods, with a 2 minute break inbetween periods, and the last minute of each period stopped clock.
                </dd>
              </div>
              <div class="p-4">
                <dt class="text-base font-semibold leading-7 text-gray-900">How do penalties work?</dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">
                  Penalties are served in the time keepers area, timed from when play restarts.
                </dd>
              </div>
              <div class="p-4">
                <dt class="text-base font-semibold leading-7 text-gray-900">Can we hit?</dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">
                  No. All games are non checking.
                </dd>
              </div>
              <div class="p-4">
                <dt class="text-base font-semibold leading-7 text-gray-900">How are standings calculated?</dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">
                  Teams get 2 points for a win and 1 point each for a draw. Tiebreakers are, in order: Points, Goal Difference, Goals For, Head to Head, Fives.
                </dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
let teams = ref({
  'Manor Top Mammoths': {
    logo: 'images/logos/manor_top_mammoths.png',
    roster: [
      'Omar Sewhdat',
      'Alex Saunders',
      'Andrew Goodrick',
      'Chris Mason',
      'Tim Cocksworth',
      'Andrew Crawley',
      'Woodsy',
      'Daniel Wand',
      'James Zeller',
      'Chris Wilson',
      'Mike Laskey',
      'Liam Murray',
      'Matthew Farnsworth',
      'Matthew Barton',
      'Nic Wood',
    ],
  },
  'Hackenthorpe Hamsters': {
    logo: 'images/logos/hackenthorpe_hamsters.png',
    roster: [
      'Warren Hewett',
      'Athene Casely-Hayford',
      'Jenny Smith',
      'Nima Assadi',
      'Jordan Sullivan',
      'Hannah Watson',
      'Joshua Tattersall',
      'Sam Krempasky',
      'Josh Barras',
      'Adam Carratt',
      'Adam Normington',
      'tbs',
      'Will Paine',
      'Andrew Graham',
      'Grace Leeming',
    ],
  },
  'Worksop Worms': {
    logo: 'images/logos/worksop_worms.png',
    roster: [
      'Callum Steventon',
      'Gareth Pirie',
      'Anna-daisy Leftly',
      'John Cawley',
      'Max Beaumont',
      'Max Callé',
      'Robert Harris',
      'Cameron Glasby',
      "Charlotte O'Brien",
      'Owen Fletcher',
      'Charlie Saunders',
      'Ben Laughton',
      'Jake Showell',
      'Peter King',
      'Harry Ashton',
      'Michael Wherry',
    ],
  },
  'Ranmoor Rabbits': {
    logo: 'images/logos/ranmoor_rabbits.png',
    roster: [
      'Nathaniel Bell',
      'Ishbel wright',
      'Adam Brooke-Smith',
      'Benjamin Stuart O’Brien',
      'Louise Beresford',
      'Bradley Roebuck',
      'Josh Humphreys',
      'Luke Reid',
      'Jaden Davies',
      'Lucien De Cloedt',
      'Sam Parkin',
      'Lewis Miles',
      'Joel Marsh',
      'Ben Crowther',
      'Oliver keeling',
    ],
  },
})

let saturdayGames = ref([
  {
    name: 'Game 1',
    home_team: 'Manor Top Mammoths',
    away_team: 'Worksop Worms',
    time: '10:00'
  },
  {
    name: 'Game 2',
    home_team: 'Hackenthorpe Hamsters',
    away_team: 'Ranmoor Rabbits',
    time: '11:05'
  },
  { name: 'Ice Cut', time: '12:05'},
  {
    name: 'Game 3',
    home_team: 'Manor Top Mammoths',
    away_team: 'Ranmoor Rabbits',
    time: '12:25'
  },
  {
    name: 'Game 4',
    home_team: 'Hackenthorpe Hamsters',
    away_team: 'Worksop Worms',
    time: '13:30'
  },
  { name: 'Ice Cut', time: '14:30'},
  {
    name: 'Game 5',
    home_team: 'Manor Top Mammoths',
    away_team: 'Hackenthorpe Hamsters',
    time: '14:50'
  },
  {
    name: 'Game 6',
    home_team: 'Worksop Worms',
    away_team: 'Ranmoor Rabbits',
    time: '15:55'
  },
]);
let sundayGames = ref([
  {
    name: 'Semi Final 1',
    home_team: '1st Place',
    away_team: '4th Place',
    time: '12:00'
  },
  {
    name: 'Semi Final 2',
    home_team: '2nd Place',
    away_team: '3rd Place',
    time: '13:05'
  },
  { name: 'Ice Cut', time: '14:05'},
  {
    name: 'Loser Final',
    home_team: 'Loser of SF1',
    away_team: 'Loser of SF2',
    time: '14:25'
  },
  { name: 'Ice Cut', time: '15:25'},
  {
    name: 'Stanley Cup Final',
    home_team: 'Winner of SF1',
    away_team: 'Winner of SF2',
    time: '15:45'
  },
  { name: 'Trophy Presentation', time: '16:45'},
]);

definePageMeta({ requiresAuth: true, name: 'Test' });
</script>