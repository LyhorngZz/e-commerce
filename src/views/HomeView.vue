<template>

    <!-- Showcase Area -->
    <ShowcaseComponent />
  
  <div class="container">
    <!-- Menu Section for categories -->
    <MenuComponent title="Featured Categories"
      :tabs="categoryTabs"
      :activeTab="activeCategoryTab"
      @tab-change="handleCategoryTabChange"
    />

    <!-- Category Section -->
    <div class="category-section">
      <CategoryComponent
        v-for="(item, index) in displayCategories"
        :key="index"
        :id="item.id ?? index"
        :name="item.name"
        :items="item.productCount"
        :image="fixImage(item.image)"
        :bgcolor="item.color"
      />
    </div>

    <!-- Promotion Section -->
    <div class="promotion-section">
      <PromotionComponent
        v-for="(promo, i) in productStore.promotions"
        :key="i"
        :title="promo.title"
        :image="fixImage(promo.image)"
        :bgcolor="promo.color"
        :buttonColor="promo.buttonColor"
      />
    </div>

    <!-- Menu Section for popular product -->
    <MenuComponent title="Featured Categories"
      :tabs="productTabs"
      :activeTab="activeProductTab"
      @tab-change="handleProductTabChange"
    />
    <div class="productContainer">
      <ProductComponent
        v-for="product in displayedPopularProducts"
        :key="product.id"
        :id="product.id"
        :name="product.name"
        :category="getCategoryName(product.categoryId)"
        :image="product.image"
        :price="product.price"
        :rating="product.rating"
        :size="product.size"
        :discount="product.discount"
        @add-to-cart="handleAddToCart(product)"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
//import axios from 'axios'
import CategoryComponent from '@/components/__tests__/CategoryComponent.vue'
import PromotionComponent from '@/components/__tests__/PromotionComponent.vue'
//import {useProductStore} from '@/stores/product_store'
import MenuComponent from '@/components/__tests__/MenuComponent.vue'
import ProductComponent from '@/components/__tests__/ProductComponent.vue'
import type { product } from '@/stores/product_store'
import { useProductStore } from '@/stores/product_store'
import ShowcaseComponent from '@/components/__tests__/ShowCaseComponent.vue'

// interface Category {
//   name: string
//   productCount: number
//   image: string
//   color: string
// }

// interface Promotion {
//   title: string
//   image: string
//   color: string
//   buttonColor: 'green' | 'orange'
// }

// const categories: Category[] = [
//   { name: 'Cake & Milk', items: 14, image: 'src/assets/cat-13 1.png', bgcolor: '#F2FCE4' },
//   { name: 'Peach', items: 17, image: 'src/assets/cat-11 1.png', bgcolor: '#FFFCEB' },
//   { name: 'Organic Kiwi', items: 21, image: 'src/assets/cat-12 1.png', bgcolor: '#ECFFEC' },
//   { name: 'Red Apple', items: 68, image: 'src/assets/cat-9 1.png', bgcolor: '#FEEFEA' },
//   { name: 'Snack', items: 34, image: 'src/assets/cat-3 1.png', bgcolor: '#FFF3EB' },
//   { name: 'Black plum', items: 25, image: 'src/assets/cat-4 1.png', bgcolor: '#FFF3FF' },
//   { name: 'Vegetables', items: 65, image: 'src/assets/cat-1 4.png', bgcolor: '#F2FCE4' },
//   { name: 'Headphone', items: 33, image: 'src/assets/cat-15 1.png', bgcolor: '#FFFCEB' },
//   { name: 'Cake & Milk', items: 54, image: 'src/assets/cat-14 1.png', bgcolor: '#F2FCE4' },
//   { name: 'Orange', items: 63, image: 'src/assets/cat-7 1.png', bgcolor: '#FFF3FF' },
// ]

// const promotions: Promotion[] = [
//   {
//     title: 'Everyday Fresh & Clean with Our Products',
//     image: 'src/assets/Cms-04 1.png',
//     bgcolor: '#F0E8D5',
//     buttonColor: 'green',
//   },
//   {
//     title: 'Make your Breakfast Healthy and Easy',
//     image: 'src/assets/Cat-01 1.png',
//     bgcolor: '#F3E8E8',
//     buttonColor: 'green',
//   },
//   {
//     title: 'The best Organic Products Online',
//     image: 'src/assets/Cms-03 1.png',
//     bgcolor: '#E7EAF3',
//     buttonColor: 'orange',
//   },
// ]

// const categories = ref<Category[]>([])
// const promotions = ref<Promotion[]>([])

//const productStore = useProductStore()

// async function fetchCategories() {
//   try {
//     const response = await axios.get("http://localhost:3000/api/categories")
//     categories.value = response.data
//   } catch (error) {
//     console.error("Error fetching categories:", error)
//   }
// }

// async function fetchPromotions() {
//   try {
//     const response = await axios.get("http://localhost:3000/api/promotions")
//     promotions.value = response.data
//   } catch (error) {
//     console.error("Error fetching promotions:", error)
//   }
// }

function fixImage(path: string): string {
  return path.startsWith('http') ? path : `http://localhost:3000/categories/${path.replace(/\\/g, "/")}`
}

const productStore = useProductStore();
const activeCategoryTab = ref('All');
const activeProductTab = ref('All');

// onMounted(() => {
//   fetchCategories()
//   fetchPromotions()
// })

onMounted(() => {
  productStore.fetchCategories()
  productStore.fetchPromotions()
  productStore.fetchGroups()
  productStore.fetchProducts()
})

// Categories tabs
const categoryTabs = computed(() => {
  const groups = productStore.getGroupNames
  return ['All', ...groups]
})

// Handle categories tabs change
const handleCategoryTabChange = (tab: string) => {
  activeCategoryTab.value = tab
}

// Display categories based on active tab
const displayCategories = computed(() => {
  let categories = []
  if (activeCategoryTab.value === 'All') {
    categories = productStore.categories.slice(0, 10)
  } else {
    categories = productStore.getCategoriesByGroup(activeCategoryTab.value)
  }
  return categories.filter(item => item.id !== undefined)
})

// Product tabs
const productTabs = computed(() => {
  const groups = productStore.getGroupNames
  return ['All', ...groups]
})

// Handle product tab change
const handleProductTabChange = (tab: string) => {
  activeProductTab.value = tab
}

// Display popular products based on active tab
const displayedPopularProducts = computed(() => {
  let products = productStore.getPopularProducts

  if (activeProductTab.value != 'All'){
    products = products.filter(p => p.group === activeProductTab.value)
  }
  return products.slice(0, 10)
})

// Handle function to get category name by id
const getCategoryName = (categoryId: number) => {
  const category = productStore.categories.find(c => c.id === categoryId)
  return category ? category.name : 'Hodo Foods'
}

// Handle add to cart
const handleAddToCart = (product: product) => {
  console.log('Added to cart:', product)
  alert(`Added ${product.name} to cart!`)
}

</script>

<style>
  .header {
  background-color: #fafafa;
  font-family: 'Poppins', sans-serif;
  color: #333;
  background-color: white;
  }

.container {
  max-width: 1586px;
  padding: 20px;
  font-family: Quicksand, sans-serif;
}

.category-section {
  display: flex;
  justify-content: start;
  gap: 15px;
  margin-bottom: 50px;
}

.promotion-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 25px;
}

.productContainer {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 20px;
  margin-bottom: 50px;
}
</style>
