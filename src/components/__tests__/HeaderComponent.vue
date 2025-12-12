<template>
  <header class="top-header">
    <!-- Search and account area -->
    <SearchBoxComponent />

    <!-- Navigation menu area -->
    <MenuItemComponent />
  </header>
</template>

<script lang="ts" setup>
import MenuItemComponent from './MenuItemComponent.vue';
import SearchBoxComponent from './SearchBoxComponent.vue';
</script>

<style scoped>
.top-header {
  display: flex;
  flex-direction: column;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  border-bottom: 1px solid #eee;
}
</style>
