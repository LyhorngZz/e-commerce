<template>
  <div class="category-card" :style="{ backgroundColor: props.bgcolor }">
    <img :src="image" alt="category" class="category-img" />
    <h3>{{ name }}</h3>
    <p>{{ items }} items</p>
  </div>
</template>

<script setup lang="ts">
interface Props {
  name: string
  items: number
  image: string
  bgcolor: string
}

const props = defineProps<Props>()
</script>

<style scoped>
.category-card {
  width: 136px;
  height: 185px;
  text-align: center;
  border-radius: 10px;
  border: 1px solid;
  border-color: #81b13d;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  padding: 5px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.category-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.category-img {
  width: 120px;
  height: 120px;
  object-fit: contain;
  margin-bottom: 8px;
}

.category-card h3 {
  font-size: 16px;
  margin: 0;
}

.category-card p {
  font-size: 12px;
  margin: 0;
  color: gray;
}
</style>
