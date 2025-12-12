<template>
  <section v-if="category" class="category-banner">
    <div class="banner-content">
      <h1>{{ category.name }}</h1>
      <p class="breadcrumb">
        Home › Categories › <span>{{ category.name }}</span>
      </p>
    </div>
  </section>

  <section v-else class="not-found">
    <p>Category not found</p>
  </section>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { useProductStore } from '@/stores/product_store'

interface Category {
  id?: number
  name: string
  productCount?: number
  items?: number
  image?: string
  color?: string
  group?: string
}

const route = useRoute()
const categoryId = Number(route.params.id)
const productStore = useProductStore()
const category = ref<Category | null>(null)

onMounted(async () => {
  await productStore.fetchCategories()
  category.value = productStore.categories.find(cat => cat.id !== undefined && cat.id === categoryId) || null
})
</script>

<style scoped>
.category-banner {
  background-color: #e8f7ef;
  background-image: url('/src/assets/category-bg.png');
  background-repeat: no-repeat;
  background-size: cover;
  padding: 40px 80px;
  border-radius: 15px;
  margin: 30px auto;
  width: 90%;
}
.banner-content h1 {
  font-size: 1.8rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 10px;
}
.breadcrumb {
  color: #666;
  font-size: 14px;
}
.breadcrumb span {
  color: #009a49;
  font-weight: 600;
}
</style>
