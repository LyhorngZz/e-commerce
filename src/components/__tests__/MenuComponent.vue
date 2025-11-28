<template>
    <div class="menu-wrapper">
        <div class="menu-header">
            <h2 class="menu-title">{{ title }}</h2>
            <div class="menu-tabs">
                <button 
                v-for="(tab, index) in tabs" 
                :key="index" 
                :class="['tab', {active: activeTab === tab}]" 
                @click="$emit('tab-change', tab)">{{ tab }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    title: string
    tabs: string[]
    activeTab: string
}>()

defineEmits<{
    'tab-change': [tab: string]
}>()

</script>

<style scoped>
.menu-wrapper {
  width: 100%;
  margin-top: 40px 0 30px;
}

.menu-header{
  align-items: center;
  font-weight: bold;
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.menu-title{
    font-family:Arial, Helvetica, sans-serif;
    font-size: 30px;
    margin-left: 1rem;
}

.menu-tabs {
  display: flex;
  gap: 35px;
  flex-wrap: wrap;
}

.tab {
  background: none;
  padding: 0;
  border: none;
  font-size: 15px;
  cursor: pointer;
  opacity: 0.7;
  position: relative;
  color: #7E7E7E;
}

.tab:hover{
  color: #000000;
}

.tab.active{
  color:#000000;
  font-weight: 700;
}

</style>
