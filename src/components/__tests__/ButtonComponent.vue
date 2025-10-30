<template>
  <button class="btn" :class="colorClass">{{ text }} →</button>
</template>

<script setup lang="ts">
import { computed } from 'vue'

interface Props {
  text: string
  color: 'green' | 'orange'
}

const props = defineProps<Props>()

const colorClass = computed(() => {
  return props.color === 'green' ? 'btn-green' : 'btn-orange'
})
</script>

<style scoped>
.btn {
  padding: 8px 18px;
  margin-top: 15px;
  border: none;
  border-radius: 3px;
  font-size: 14px;
  color: white;
  cursor: pointer;
  transition: background 0.3s ease;
}

.btn-green {
  background: #2ecc71;
}

.btn-green:hover {
  background: #27ae60;
}

.btn-orange {
  background: #f39c12;
}

.btn-orange:hover {
  background: #e67e22;
}
</style>
