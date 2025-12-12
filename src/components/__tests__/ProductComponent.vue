<template>
  <!-- Wrap card with RouterLink -->
  <RouterLink :to="`/products/${id}`" class="product-card-link">
    <div class="product-card">
      <div class="product-badge" v-if="discount && discount > 0">
        -{{ Math.round(discount) }}%
      </div>

      <div class="product-image">
        <img :src="image" :alt="name" />
      </div>

      <div class="product-info">
        <div class="product-category">{{ category }}</div>
        <h3 class="product-name">{{ name }}</h3>

        <div class="product-rating">
          <div class="stars">
            <span
              v-for="i in 5"
              :key="i"
              class="star"
              :class="{ filled: i <= Math.round(rating) }"
              >★</span
            >
          </div>
          <span class="rating-text">({{ rating.toFixed(1) }})</span>
        </div>

        <div class="product-meta">
          <span class="product-size">{{ size }}</span>
        </div>

        <div class="product-footer">
          <div class="product-price">
            <span class="current-price">${{ currentPrice }}</span>
            <span
              class="old-price"
              v-if="discount && discount > 0"
              >${{ price.toFixed(2) }}</span
            >
          </div>
          <!-- Stop event so it doesn't navigate -->
          <button class="add-button" @click.stop="$emit('add-to-cart')">
            <span>Add</span>
            <span class="add-icon">+</span>
          </button>
        </div>
      </div>
    </div>
  </RouterLink>
</template>

<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
  id: number
  name: string
  rating: number
  size: string
  image: string
  price: number
  discount?: number
  category: string
}>()

defineEmits<{ 'add-to-cart': [] }>()

const currentPrice = computed(() => {
  if (props.discount && props.discount > 0) {
    return (props.price * (1 - props.discount / 100)).toFixed(2)
  }
  return props.price.toFixed(2)
})
</script>

<style scoped>
.product-card-link {
  text-decoration: none;
  color: inherit;
  display: block;
}

.product-card {
  border: 1px solid #ececec;
  border-radius: 15px;
  padding: 25px 20px;
  background: white;
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
}

.product-card:hover {
  box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.08);
  border-color: #bce3c9;
  transform: translateY(-3px);
}

.product-badge {
  position: absolute;
  top: 20px;
  left: -10px;
  background: #30c35f;
  color: white;
  padding: 6px 20px;
  border-radius: 99px;
  font-size: 14px;
  font-weight: 700;
}

.product-image {
  text-align: center;
  margin-bottom: 20px;
  height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.product-image img {
  max-width: 80%;
}

.product-info {
  text-align: left;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.product-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: auto;
}

.add-button {
  background: #def9ec;
  color: #3bb77e;
  border: none;
  padding: 8px 18px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s;
  font-size: 14px;
}

.add-button:hover {
  background: #3bb77e;
  color: white;
}
</style>
