<template>
  <div id="app">
    <!-- Header (if you want it globally) -->
    <HeaderComponent />

    <!-- The routed page will display here -->
    <router-view />

    <!-- Footer (optional) -->
  </div>
</template>

<script lang="ts" setup>
import HeaderComponent from '@/components/__tests__/HeaderComponent.vue'
</script>

<style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
}
</style>
