<template>
  <div class="promotion-card" :style="{ backgroundColor: props.bgcolor }">
    <div class="promo-text">
      <h2>{{ title }}</h2>
      <ButtonComponent @click = "ShopNow" :color="buttonColor" text="Shop Now" />
    </div>
    <img :src="image" alt="promotion" class="promo-img" />
  </div>
</template>

<script setup lang="ts">
import ButtonComponent from './ButtonComponent.vue'

const ShopNow = (): void => {
  alert('Let\'s shop: '+ props.title)
}

interface Props {
  title: string
  image: string
  bgcolor: string
  buttonColor: 'green' | 'orange'
}

const props = defineProps<Props>()
</script>

<style scoped>
.promotion-card {
  height: 250px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-radius: 10px;
  padding: 25px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.promo-text {
  margin-left: 10px;
  max-width: 70%;
}

.promo-text h2 {
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 15px;
}

.promo-img {
  height: 200px;
  margin-top: 100px;
}
</style>
