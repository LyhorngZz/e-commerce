<template>
  <div class="promotion-card" :style="{ backgroundColor: props.bgcolor }">
    <div class="promo-text">
      <h2>{{ title }}</h2>
      <!-- Button navigates to product detail -->
      <ButtonComponent @click="shopNow" :color="buttonColor" text="Shop Now" />
    </div>
    <img :src="image" alt="promotion" class="promo-img" />
  </div>
</template>

<script setup lang="ts">
import { useRouter } from 'vue-router'
import ButtonComponent from './ButtonComponent.vue'

interface Props {
  id?: number // optional for now (static)
  title: string
  image: string
  bgcolor: string
  buttonColor: 'green' | 'orange'
}

const props = defineProps<Props>()
const router = useRouter()

// Navigate to the product detail page
const shopNow = () => {
  // if ID is provided, go to that product — otherwise go to a static one
  const productId = props.id || 1
  router.push(`/products/${productId}`)
}
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
