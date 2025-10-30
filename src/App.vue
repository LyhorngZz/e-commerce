<template>
  <div class="container">
    <!-- Category Section -->
    <div class="category-section">
      <CategoryComponent
        v-for="(item, index) in categories"
        :key="index"
        :name="item.name"
        :items="item.items"
        :image="item.image"
        :bgcolor="item.bgcolor"
      />
    </div>

    <!-- Promotion Section -->
    <div class="promotion-section">
      <PromotionComponent
        v-for="(promo, i) in promotions"
        :key="i"
        :title="promo.title"
        :image="promo.image"
        :bgcolor="promo.bgcolor"
        :buttonColor="promo.buttonColor"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import CategoryComponent from './components/__tests__/CategoryComponent.vue'
import PromotionComponent from './components/__tests__/PromotionComponent.vue'

interface Category {
  name: string
  items: number
  image: string
  bgcolor: string
}

interface Promotion {
  title: string
  image: string
  bgcolor: string
  buttonColor: 'green' | 'orange'
}

const categories: Category[] = [
  { name: 'Cake & Milk', items: 14, image: 'src/assets/cat-13 1.png', bgcolor: '#F2FCE4' },
  { name: 'Peach', items: 17, image: 'src/assets/cat-11 1.png', bgcolor: '#FFFCEB' },
  { name: 'Organic Kiwi', items: 21, image: 'src/assets/cat-12 1.png', bgcolor: '#ECFFEC' },
  { name: 'Red Apple', items: 68, image: 'src/assets/cat-9 1.png', bgcolor: '#FEEFEA' },
  { name: 'Snack', items: 34, image: 'src/assets/cat-3 1.png', bgcolor: '#FFF3EB' },
  { name: 'Black plum', items: 25, image: 'src/assets/cat-4 1.png', bgcolor: '#FFF3FF' },
  { name: 'Vegetables', items: 65, image: 'src/assets/cat-1 4.png', bgcolor: '#F2FCE4' },
  { name: 'Headphone', items: 33, image: 'src/assets/cat-15 1.png', bgcolor: '#FFFCEB' },
  { name: 'Cake & Milk', items: 54, image: 'src/assets/cat-14 1.png', bgcolor: '#F2FCE4' },
  { name: 'Orange', items: 63, image: 'src/assets/cat-7 1.png', bgcolor: '#FFF3FF' },
]

const promotions: Promotion[] = [
  {
    title: 'Everyday Fresh & Clean with Our Products',
    image: 'src/assets/Cms-04 1.png',
    bgcolor: '#F0E8D5',
    buttonColor: 'green',
  },
  {
    title: 'Make your Breakfast Healthy and Easy',
    image: 'src/assets/Cat-01 1.png',
    bgcolor: '#F3E8E8',
    buttonColor: 'green',
  },
  {
    title: 'The best Organic Products Online',
    image: 'src/assets/Cms-03 1.png',
    bgcolor: '#E7EAF3',
    buttonColor: 'orange',
  },
]
</script>

<style>
.container {
  max-width: 1586px;
  padding: 20px;
  font-family: Quicksand, sans-serif;
}

.category-section {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-bottom: 50px;
}

.promotion-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 25px;
}
</style>
