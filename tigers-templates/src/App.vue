<template>
  <div class="">
    <div class="m-8" v-if="!activeTemplate">
      <div class="text-center mb-8 text-3xl">
        Templates
      </div>
      <div class="flex justify-center">
        <div class="grid grid-cols-5" v-for="t, k in templates">
        <div class="w-64 h-64 bg-red-100" @click="activeTemplate = k">{{  k }}</div>
        </div>
      </div>
    </div>
    <div class="" v-else>
      <component :is="templates[activeTemplate]" />
    </div>
    
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import GameFlyer from './components/GameFlyer.vue';
import GameResult from './components/GameResult.vue';
import GameLineup from './components/GameLineup.vue';

const activeTemplate = ref('Game Flyer');

const templates = {
  'Game Flyer': GameFlyer,
  'Game Result': GameResult,
  'Game Lineup': GameLineup,
  'Player Profile': null,
  'Man of the Match': null,
}
</script>
